<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:02
 */

namespace App\DAO;


use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;

class FilmDAO
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

    public function createFilm(Film $film){

        $this->em ->persist($film);
        $this->em->flush();
        $this->em->refresh($film);
        return $film;
    }


}