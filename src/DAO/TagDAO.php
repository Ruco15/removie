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
            $this->em->persist($tag);
            $this->em>flush();
            $this->em->refresh($tag);
            return $tag;
    }

    public function getTagByString($name){
        $query = $this->em->createQuery("SELECT t WHERE App\Entity\Tag t WHERE t.nome = :nome");
        $query->setParameter("nome", strtolower($name));
        $tag = $query->getResult();
        if($tag === null || empty($tag)|| count($tag)===0 ){
            return null;
        }
        return $tag[0];
    }
}