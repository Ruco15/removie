<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 02/07/2018
 * Time: 16:33
 */

namespace App\Controller;


use App\Entity\FilmGenere;
use App\Entity\Generi;
use App\Entity\OscarFilm;
use App\ExceptionPersonalizzate\RemovieException;
use App\Modal\Errore;
use App\Modal\FilmModal;
use App\Controller\AbstractController;
use App\Modal\OscarModal;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Symfony\Component\HttpFoundation\Request;
use App\Util\JsonUtil;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class FilmController extends AbstractController
{


    /**
     * @Route("/addfilm")
     */
    public function addFilm(Request $request)
    {
        $filmModal = JsonUtil::deserializeJson($request->getContent(), FilmModal::class);
        if ($filmModal instanceof FilmModal) {
            $validationModal = $this->getValidator()->validate($filmModal);
            $validationFilm = $this->getValidator()->validate($filmModal->getFilm());
            if (count($validationModal) === 0) {
                try {
                    $this->getEm()->getConnection()->beginTransaction();

                    $film = $this->getFilmDao()->createFilm($filmModal->getFilm());
                    $this->addGenereFilm($filmModal->getGenereId(), $film);
                    $this->addPremioOscar($filmModal->getOscarId(),$film);
                    $this->getEm()->getConnection()->commit();
                } catch (ConstraintViolationException |RemovieException| Exception $e) {
                    $error = new Errore();
                    $this->getEm()->getConnection()->rollback();
                    $error->setDescrizione($e->getMessage());
                    $error->setCode($e->getCode());
                }
            } else {
                $error = new Errore();
                $error->setDescrizione("Errore di validazione, inserire bene i dati!");
                $error->setCode("0");

            }


        } else {
            $error = $filmModal;
        }

        if (!empty($error)) {
            $jsonOut = JsonUtil::serializeJson($error);
        } else {
            $jsonOut = JsonUtil::serializeJson($filmModal);
        }

        $response = new Response(
            $jsonOut,
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;
    }

    /**
     * @Route("/addfilm/personaggi")
     */
    public function addPersonaggiFilm(Request $request)
    {

    }

    /**
     * @Route("/addfilm/addmultimedia")
     */
    public function addMultimediFilm(Request $request)
    {

    }

    private function addGenereFilm(array $genere, $film)
    {
        if (count($genere) > 0) {

            foreach ($genere as $gen) {
                $genereFilm = new FilmGenere();
                $genereFilm->setIdFilm($film);
                $genereT = $this->getGenereDAO()->getGenereById($gen);
                $genereFilm->setIdGenere($genereT);
                $this->getFilmGenereDao()->associaGenereAlFilm($genereFilm);

            }
        }else{
            throw new RemovieException("Inserire almeno un genere", ErrorEnum::OGGETTO_NON_TROVATO);
        }
    }

  private function addPremioOscar($oscar,$film){
      if (count($oscar) > 0 and $oscar instanceof OscarModal) {

          foreach ($oscar as $osc) {
             $oscarFilm = new OscarFilm();
             $oscarFilm->setIdFilm($film);
             $oscar = $this->getOscarDAO()->getOscarById($osc->getIdOscar());
             $tipo = $this->getTipiGenericiDAO()->getTipoGenericoByName($osc->getIdTipo());
             $oscarFilm ->setIdTipo($tipo);
             $oscarFilm->setAnno($osc->getAnno());
             $oscarFilm->setIdOscar($oscar);
             $this->getOscarFilmDao() ->associaOscarAlFilm($oscarFilm);
             }
      } else{
          throw new RemovieException("Errore di insance", 1);
      }

  }


}