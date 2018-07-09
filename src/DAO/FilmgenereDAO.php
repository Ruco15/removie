<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:09
 */

namespace App\DAO;


use App\Entity\FilmGenere;
use Doctrine\ORM\EntityManagerInterface;


class FilmgenereDAO
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

    public function associaGenereAlFilm(FilmGenere $filmgenere){
    $this->em->persist($filmgenere);
    $this->em->flush();

    return $filmgenere;
    }

    public function filmEGenereGiaAssociati(FilmGenere $filmgenere){


    }
}