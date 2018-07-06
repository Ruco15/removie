<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 02/07/2018
 * Time: 16:33
 */

namespace App\Controller;


use App\Modal\Errore;
use App\Modal\FilmModal;
use App\Controller\AbstractController;
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
                    foreach ($filmModal->getGenereId() as $gen){
                   //     $this->getGenereDAO()->get

                    }

                    $this->getEm()->getConnection()->commit();
                } catch (ConstraintViolationException | Exception $e) {
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



        }else{
            $error = $filmModal;
        }

        if(!empty($error)){
            $jsonOut = JsonUtil::serializeJson($error);
        }else{
            $jsonOut = JsonUtil::serializeJson($film);
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
}