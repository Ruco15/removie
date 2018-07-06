<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:09
 */

namespace App\DAO;
use App\Entity\Generi;
use App\Modal\Errore;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\FilmGenere;

class GenereDAO
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

    public function getGenereById($idGenere){
            $genere = $this->em->find(Generi::class,$idGenere);
            if($genere== null){
                $error = new Errore();
                $error->setCode("1");
                $error->setDescrizione("genere non trovato");
            }
    }

    public function filmEGenereGiaAssociati(FilmGenere $filmgenere){


    }
}