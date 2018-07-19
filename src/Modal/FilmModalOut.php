<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 16/07/2018
 * Time: 17:15
 */

namespace App\Modal;


use App\Entity\Film;
use App\Entity\FilmGenere;
use App\Entity\Generi;
use App\Entity\OscarFilm;
use App\Entity\TagColl;

class FilmModalOut
{
    /**
     * @var Film
     */
    private $film;
    /**
     * @var array
     */
    private $oscar = array();
    /**
     * @var array
     */
    private $generi = array();
    /**
     * @var array
     */
    private $tag = array();

    /**
     * @return Film
     */
    public function getFilm(): Film
    {
        return $this->film;
    }

    /**
     * @param Film $film
     */
    public function setFilm(Film $film): void
    {
        $this->film = $film;
    }

    /**
     * @return array
     */
    public function getOscar(): array
    {
        return $this->oscar;
    }

    /**
     * @param OscarFilm
     */
    public function setOscar($oscar): void
    {
        $this->oscar[] = $oscar;
    }

    /**
     * @return array
     */
    public function getGeneri(): array
    {
        return $this->generi;
    }

    /**
     * @param FilmGenere
     */
    public function setGeneri($generi): void
    {
        $this->generi[] = $generi;
    }

    /**
     * @return array
     */
    public function getTag(): array
    {
        return $this->tag;
    }

    /**
     * @param TagColl
     */
    public function setTag($tag): void
    {
        $this->tag []= $tag;
    }


}