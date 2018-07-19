<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 14:57
 */

namespace App\DAO;
use App\Entity\LavoropersonaggiPersonaggi;
use Doctrine\ORM\EntityManagerInterface;

class LavoropersonaggiPersonaggiDAO
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

    public function associaPersonaggioAFilm(LavoropersonaggiPersonaggi $lavoropersonaggiPersonaggi){
        $this->em->persist($lavoropersonaggiPersonaggi);
        $this->em->flush();
        $this->em->refresh($lavoropersonaggiPersonaggi);
        return $lavoropersonaggiPersonaggi;

    }
}