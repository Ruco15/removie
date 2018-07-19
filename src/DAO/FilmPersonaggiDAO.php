<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 14:46
 */

namespace App\DAO;
use App\Entity\FilmPersonaggi;
use Doctrine\ORM\EntityManagerInterface;

class FilmPersonaggiDAO
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

    public function associaPersonaggioAFilm(FilmPersonaggi $filmPersonaggi){
        $this->em->persist($filmPersonaggi);
        $this->em->flush();
        $this->em->refresh($filmPersonaggi);
        return $filmPersonaggi;

    }

}