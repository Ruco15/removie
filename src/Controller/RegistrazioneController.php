<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 27/06/2018
 * Time: 09:56
 */

namespace App\Controller;


use App\Entity\Anagrafica;
use App\Entity\Richiesteregistrazioni;
use App\Entity\Utenti;
use App\Modal\ConfermaRegistrazioneModal;
use App\Modal\Errore;
use App\Util\JsonUtil;
use App\Util\NumberUtil;
use DateTime;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrazioneController Extends Controller
{
    protected $entityManager;
    private $validator;
    private $utentiDAO;
    private $richiesteDAO;
    private $sendEmail;

    /**
     * RegistrazioneController constructor.
     */
    private function instance()
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        $this->validator = $this->container->get('validator');
        $this->utentiDAO = $this->container->get('service.utenti');
        $this->richiesteDAO = $this->container->get('service.richiesteregistrazioni');
        $this->sendEmail = $this->container->get("service.sendemail");
    }

    private function createRichiesta($utente, $data): Richiesteregistrazioni
    {
        $registrazione = new Richiesteregistrazioni();
        $codeConfirm = NumberUtil::generateRandomNumber(8);
        $registrazione->setCodice($codeConfirm);
        $registrazione->setIdUtente($utente);
        $registrazione->setDatarichiesta($data->format('d/m/Y H:i:s'));
        $registrazione->setIsValid(True);
        $registrazione = $this->richiesteDAO->addRichiesteRegistrazioni($registrazione);
        return $registrazione;
    }

    /**
     * @Route("/registrazione")
     */
    public function registrazione(Request $request)
    {
        // configurazioni varie
        $ruoliDAO = $this->container->get('service.ruoli');
        $this->instance();

        //Dichiarazioni varibili

        $data = new DateTime();

        // procedimento
        //Serializzazione e controlli di validazione
        $utente = JsonUtil::deserializeJson($request->getContent(), Utenti::class);
        $errorsUtente = $this->validator->validate($utente);
        $errorsAnagrafica = $this->validator->validate($utente->getAnagrafica());
        if (count($errorsUtente) > 0 || count($errorsAnagrafica) > 0) {
            $error = new Errore();
            $error->setCode("1");
            $error->setDescrizione("Inserisci tutti i campi richiesti");

        } else {
            try {
                $this->entityManager->getConnection()->beginTransaction();

                //Creazione dell'utente
                $newPassword = md5($utente->getPassword());
                $utente->setPassword($newPassword);
                $ruolo = $ruoliDAO->getRuoliByName(1);
                $utente->setIdRuolo($ruolo);
                $utente->setIsActive(False);
                $utente->setDatacreazione($data->format('d/m/Y H:i:s'));
                $utente = $this->utentiDAO->addUtenti($utente);
                $registrazione = $this->createRichiesta($utente, $data);

                //invio dell'email di conferma
                $this->sendEmail->sendEmail($registrazione->getCodice(), $utente->getEmail());


                //creazione richiesta di registrazione
                $this->entityManager->getConnection()->commit();
            } catch (ConstraintViolationException | Exception $e) {
                $error = new Errore();
                $this->entityManager->getConnection()->rollback();
                $error->setDescrizione($e->getMessage());
                $error->setCode($e->getCode());
            }
        }

        if (!empty($error)) {
            $jsonResponse = JsonUtil::serializeJson($error);
        } else{
            $jsonResponse = JsonUtil::serializeJson($utente);
        }

        $response = new Response(
            $jsonResponse,
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;
    }

    /**
     * @Route("/confermaregistrazione")
     */
    public function confermaRegistrazione(Request $request)
    {
        //dichiarazioni
        $this->instance();
        $utente = new Utenti();
        $data = new DateTime();
        $confermaRegistrazione = new ConfermaRegistrazioneModal();
        $richiesta = new Richiesteregistrazioni();

        //validazione e serializzazione
        $confermaRegistrazione->setCodiceConferma($request->get("codice"));
        $confermaRegistrazione->setIdUser($request->get("iduser"));

        if (empty($confermaRegistrazione)) {
            $error = new Errore();
            $error->setDescrizione("errore nella richiesta");

        } else {
            $errorsValidazione = $this->validator->validate($confermaRegistrazione);
            if (count($errorsValidazione) > 0) {
                $error = new Errore();
                $error->setCode("1");
                $error->setDescrizione("Errore di validazione");
            } else {
                $this->entityManager->getConnection()->beginTransaction();
                $utente = $this->utentiDAO->getUtentiById($confermaRegistrazione->getIdUser());
                if (!$utente instanceof Errore) {

                    $richiesta = $this->richiesteDAO->getRichiestaByIdUtente($utente);
                    if (!$richiesta instanceof Errore) {

                        if ($richiesta[0]->getCodice() === $confermaRegistrazione->getCodiceConferma() and $richiesta[0]->isValid() ) {
                            $utente->setIsActive(True);
                            $utente = $this->utentiDAO->updateUtente($utente);
                            $richiesta[0]->setIsValid(False);
                            $this->richiesteDAO->updateRichiestaRegistrazione($richiesta[0]);

                        } else {
                            $error = new Errore();
                            $error->setCode("3");
                            $error->setDescrizione("Il codice inserito non corrisponde, è stata inviata una nuova richiesta");
                            $richiesta[0]->setIsValid(False);
                            $this->richiesteDAO->updateRichiestaRegistrazione($richiesta[0]);
                            $registrazione = $this->createRichiesta($utente, $data);
                            $this->sendEmail->sendEmail($registrazione->getCodice(), $utente->getEmail());
                        }
                    }
                }
                $this->entityManager->getConnection()->commit();
            }

        }
        if (!empty($error)) {
            $jsonResponse = JsonUtil::serializeJson($error);
        }else{
            $jsonResponse = JsonUtil::serializeJson($richiesta[0]);
        }


        $response = new Response(
            $jsonResponse,
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;
    }
}