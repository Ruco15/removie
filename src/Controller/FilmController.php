<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 02/07/2018
 * Time: 16:33
 */

namespace App\Controller;


use App\Entity\FilmGenere;
use App\Entity\FilmPersonaggi;
use App\Entity\FilmProduttore;
use App\Entity\Generi;
use App\Entity\OscarFilm;
use App\Entity\Tag;
use App\Entity\TagColl;
use App\ExceptionPersonalizzate\RemovieException;
use App\Modal\AttoreModal;
use App\Modal\Errore;
use App\Modal\FilmModal;
use App\Controller\AbstractController;
use App\Modal\FilmModalOut;
use App\Modal\FilmPersonaggiModal;
use App\Modal\FilmPersonaggiModalOut;
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
     * @var FilmModalOut
     */
    private $filmModalOut;

    /**
     * @var FilmPersonaggiModalOut
     */
    private $filmPersonaggiModalOut;

    /**
     *
     *
     * /**
     * @Route("/addfilm")
     */
    public function addFilm(Request $request)
    {

        try {

            $this->getEm()->getConnection()->beginTransaction();
            $filmModal = JsonUtil::deserializeJson($request->getContent(), FilmModal::class);
              $film = $filmModal->getFilm();
              $this->validator($film, "Film");
              $this->validator($filmModal, "FilmModal");
              $tipgen = $this->getTipiGenericiDAO()->getTipoGenericoByName(TipiGenericiEnum::FILM);
              $film->setIdTipo($tipgen);
              $film = $this->getFilmDao()->createFilm($film);
              $this->getFilmModalOut()->setFilm($film);
              $this->addGenereFilm($filmModal->getGenereId(), $film);
              $this->addPremioOscar($filmModal->getOscarId(), $film);
              $this->associaTag($film, $filmModal->getTagName());
              $this->getEm()->getConnection()->commit();
              $jsonOut = JsonUtil::serializeJson($this->getFilmModalOut());
        } catch (ConstraintViolationException |RemovieException| Exception $e) {
            $error = new Errore();
            $this->getEm()->getConnection()->rollback();
            $error->setDescrizione($e->getMessage());
            $error->setCode($e->getCode());
            $jsonOut = JsonUtil::serializeJson($error);
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
        try {
            $this->getEm()->getConnection()->beginTransaction();
            $filmPersonaggiModal = JsonUtil::deserializeJson($request->getContent(), FilmPersonaggiModal::class);
            $this->validator($filmPersonaggiModal, "FilmPersonaggiModal");
            $film = $this->getFilmDao()->getFilmById($filmPersonaggiModal->getFilm()->getId());
            $film =  $this->associaPersonaggioAFilm($filmPersonaggiModal->getListpersonaggi(), $film);
            $film =  $this->associaProduttorealFilm($filmPersonaggiModal->getProduttore(), $film);
            $film = $this->getFilmDao()->updateFilm($film);
            $this->getFilmPersonaggiModalOut()->setFilm($film);
            $this->getEm()->getConnection()->commit();
            $jsonOut = JsonUtil::serializeJson($this->getFilmPersonaggiModalOut());
        } catch (ConstraintViolationException | RemovieException | Exception  $e) {
            $error = new Errore();
            $this->getEm()->getConnection()->rollback();
            $error->setDescrizione($e->getMessage());
            $error->setCode($e->getCode());
            $jsonOut = JsonUtil::serializeJson($error);
        }

        $response = new Response(
            $jsonOut,
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;
    }

    /**
     * @Route("/addfilm/addmultimedia")
     */
    public function addMultimediFilm(Request $request)
    {
        $id = $request->query->get("id");
        $film = $this->getFilmDao()->getFilmById($id);
       $jsonOut = JsonUtil::serializeJson($film);
        $response = new Response(
            $jsonOut,
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;
    }


    private function addGenereFilm(array $genere, $film)
    {
        if (count($genere) > 0) {

            foreach ($genere as $gen) {
                $genereFilm = new FilmGenere();
                $genereFilm->setIdFilm($film);
                $genereT = $this->getGenereDAO()->getGenereById($gen);
                $genereFilm->setIdGenere($genereT);
                $genereFilm = $this->getFilmGenereDao()->associaGenereAlFilm($genereFilm);
                $this->getFilmModalOut()->setGeneri($genereFilm);
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
                $oscarFilm = $this->getOscarFilmDao()->associaOscarAlFilm($oscarFilm);
                $this->getFilmModalOut()->setOscar($oscarFilm);
            }
        }

    }

    private function associaTag($object, array $tag)
    {
        foreach ($tag as $t) {
            $tagVerificato = $this->getTagDao()->getTagByString($t);
            if ($tagVerificato === null) {
                $tagVerificato = new Tag();
                $tagVerificato->setNome(strtolower($t));
                $tagVerificato = $this->getTagDao()->createTag($tagVerificato);
            }
            $tagCol = new TagColl($object, $tagVerificato);
            $tagCol = $this->getTagCollDao()->associaTag($tagCol);
            $this->getFilmModalOut()->setTag($tagCol);
        }

    }

    private function associaPersonaggioAFilm(array $listPersonaggi, $film)
    {

        foreach ($listPersonaggi as $attore) {
            if ($attore instanceof AttoreModal) {
                $this->validator($attore, "AttoreModal");
                $filmPersonaggi = new FilmPersonaggi();
                $filmPersonaggi->setIdFilm($film);
                $lavoro = $this->getLavoropersonaggiDAO()->getLavoroById($attore->getIdlavoro());
                $personaggio = $this->getPersonaggiDAO()->getPersonaggioById($attore->getIdattore());
                $filmPersonaggi->setIdPersonaggio($personaggio);
                $filmPersonaggi->setIdLavoro($lavoro);
                $film->getFilmPersonaggio()->add($filmPersonaggi);

            }
        }
        return $film;
    }

    private function associaProduttorealFilm($idproduttore, $film)
    {

        $produttore = $this->getProduttoriDAO()->getProduttoreById($idproduttore);
        $film->setProduttore($produttore);
        return $film;
    }

    /*
    * @return FilmModalOut
    */
    public function getFilmModalOut(): FilmModalOut
    {
        if ($this->filmModalOut == null) {
            $this->filmModalOut = new FilmModalOut();
        }
        return $this->filmModalOut;
    }

    /*
    * @return FilmPersonaggiModalOut
    */
    public function getFilmPersonaggiModalOut(): FilmPersonaggiModalOut
    {
        if ($this->filmPersonaggiModalOut == null) {
            $this->filmPersonaggiModalOut = new FilmPersonaggiModalOut();
        }
        return $this->filmPersonaggiModalOut;
    }


}