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
use App\Entity\FilmProduttore;
use App\Entity\Generi;
use App\Entity\OscarFilm;
use App\Entity\TagColl;

class FilmPersonaggiModalOut
{
    /**
     * @var Film
     */
    private $film;


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




}