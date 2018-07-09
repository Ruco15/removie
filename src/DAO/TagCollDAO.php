<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:26
 */

namespace App\DAO;


use App\Entity\TagColl;
use Doctrine\ORM\EntityManagerInterface;
class TagCollDAO
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


    public function associaTag(TagColl $coll){

    }
}