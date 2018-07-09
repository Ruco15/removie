<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:09
 */

namespace App\DAO;

use Doctrine\ORM\EntityManagerInterface;


use App\Entity\FilmGenere;
use App\Entity\OscarFilm;

class OscarFilmDAO
{
    /**
     *
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function associaOscarAlFilm(OscarFilm $oscarFilm)
    {

    }

    public function filmEOscarGiaAssociati(OscarFilm $oscarFilm)
    {


    }
}