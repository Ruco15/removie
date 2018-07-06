<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 26/06/2018
 * Time: 14:08
 */

namespace App\DAO;
use App\Entity\Ruoli;
use Doctrine\ORM\EntityManagerInterface;

class RuoliDAO
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

    public function getRuoliByName($nameRuoli):Ruoli{

        return $this ->em->find(Ruoli::class,$nameRuoli);
    }
        
        


}