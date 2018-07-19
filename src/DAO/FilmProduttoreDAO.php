<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 15:20
 */

namespace App\DAO;
use App\Entity\FilmProduttore;
use Doctrine\ORM\EntityManagerInterface;

class FilmProduttoreDAO
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

    public function associaProduttoreAFilm(FilmProduttore $filmProduttore){
        $this->em->persist($filmProduttore);
        $this->em->flush();
        $this->em->refresh($filmProduttore);
        return $filmProduttore;

    }
}