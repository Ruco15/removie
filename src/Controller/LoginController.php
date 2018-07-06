<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 02/07/2018
 * Time: 11:08
 */

namespace App\Controller;


use App\Modal\LoginModal;
use App\Modal\LoginModalOutput;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use App\Modal\Errore;
use App\Entity\Utenti;
use App\Util\JsonUtil;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller

{
    protected $entityManager;
    private $validator;
    private $utentiDAO;

    private function instance()
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        $this->validator = $this->container->get('validator');
        $this->utentiDAO = $this->container->get('service.utenti');

    }

    /**
     * @Route("/login")
     */
    public function login(Request $request)
    {
        // dichiarazioni variabili
        $loginModal = new LoginModal();
        $this->instance();
        $loginModalOut = new LoginModalOutput();

        //Set parametri
        $loginModal->setUsername($request->get("username"));
        $loginModal->setPassword($request->get("password"));

        //validazione
        $validationLogin = $this->validator->validate($loginModal);
        if (count($validationLogin) > 0) {
            $error = new Errore();
            $error->setDescrizione("Errore nella richiesta");
            $error->setCode("0");
        } else {
            $loginModal->setPassword(md5($loginModal->getPassword()));
            $utente = $this->utentiDAO->getUtenteForLogin($loginModal);
            if (!$utente instanceof Errore) {
                $session = new Session();
                $session->start();
                $session->set("username", $utente[0]->getUsername());
                $session->set("ruolo", $utente[0]->getIdRuolo());
                $loginModalOut->setUsername($utente[0]->getUsername());
                $loginModalOut->setRuolo($utente[0]->getIdRuolo()->getNome());
            } else {
                $error = $utente;
            }
        }

        if (!empty($error)) {
            $jsonResponse = JsonUtil::serializeJson($error);
        } else {
            $jsonResponse = JsonUtil::serializeJson($loginModalOut);
        }
        $response = new Response(
            $jsonResponse,
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;
    }
    /**
     * @Route("/logout")
     */
    public function logout()
    {


    }
}