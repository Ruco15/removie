<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:23
 */

namespace App\DAO;
use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
class TagDAO
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

    public function createTag(Tag $tag){

    }

    public function getTagByString($name){

    }
}