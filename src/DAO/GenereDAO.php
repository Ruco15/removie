<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:09
 */

namespace App\DAO;
use App\Entity\Generi;
use App\ExceptionPersonalizzate\RemovieException;
use App\Modal\Errore;
use App\Util\ErrorEnum;
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

    public function getGenereById($idGenere): Generi{
            $genere = $this->em->find(Generi::class,$idGenere);
            if($genere==null){
             throw new RemovieException("Genere non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
            }
            return $genere;
    }

    public function filmEGenereGiaAssociati(FilmGenere $filmgenere){


    }
}