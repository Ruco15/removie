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
use App\Entity\Tag;
use App\ExceptionPersonalizzate\RemovieException;
use App\Modal\Errore;
use App\Modal\FilmModal;
use App\Controller\AbstractController;
use App\Modal\OscarModal;
use App\Util\TipiGenericiEnum;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Symfony\Component\HttpFoundation\Request;
use App\Util\JsonUtil;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Util\ErrorEnum;

class FilmController extends AbstractController
{


    /**
     * @Route("/addfilm")
     */
    public function addFilm(Request $request)
    {
        try {
            $filmModal = JsonUtil::deserializeJson($request->getContent(), FilmModal::class);
            $this->getEm()->getConnection()->beginTransaction();
            $film = $filmModal->getFilm();
            $this->validator($film, "Film");
            $this->validator($filmModal, "FilmModal");
            $tipgen = $this->getTipiGenericiDAO()->getTipoGenericoByName(TipiGenericiEnum::FILM);
            $film->setIdTipo($tipgen);
            $film = $this->getFilmDao()->createFilm($film);
            $this->addGenereFilm($filmModal->getGenereId(), $film);
            $this->addPremioOscar($filmModal->getOscarId(), $film);
            $this->getEm()->getConnection()->commit();
            $jsonOut = JsonUtil::serializeJson($filmModal);
        } catch (ConstraintViolationException |RemovieException| Exception $e) {
            $error = new Errore();
            $this->getEm()->getConnection()->rollback();
            $error->setDescrizione($e->getMessage());
            $error->setCode($e->getCode());
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
        } else {
            throw new RemovieException("Inserire almeno un genere", ErrorEnum::OGGETTO_NON_TROVATO);
        }
    }

    private function addPremioOscar($oscar, $film)
    {
        foreach ($oscar as $osc) {
            if ($osc instanceof OscarModal) {
                $this->validator($osc, "OscarModal");
                $oscarFilm = new OscarFilm();
                $oscarFilm->setIdFilm($film);
                $oscar = $this->getOscarDAO()->getOscarById($osc->getIdoscar());
                $tipo = $this->getTipiGenericiDAO()->getTipoGenericoById($osc->getIdtipo());
                $oscarFilm->setIdTipo($tipo);
                $oscarFilm->setAnno($osc->getAnno());
                $oscarFilm->setIdOscar($oscar);
                $this->getOscarFilmDao()->associaOscarAlFilm($oscarFilm);
            }
        }

    }

    private function associaTag($object, array $tag){
            foreach ($tag as $t){
                $tagVerificato = $this->getTagDao()->getTagByString($t);
                if($tagVerificato === null){
                    $tagVerificato = new Tag();
                    $tagVerificato->setNome(strtolower($t));
                   $tagVerificato = $this->getTagDao()->createTag($tagVerificato);
                }

            }
    }


}