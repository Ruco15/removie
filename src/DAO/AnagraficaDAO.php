<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 26/06/2018
 * Time: 14:08
 */

namespace App\DAO;
use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use App\Entity\Anagrafica;
class AnagraficaDAO
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

    public function getAnagraficaById($idAnagrafica):Anagrafica{
        $anagrafica = $this ->em->find("Anagrafica",$idAnagrafica);

        if(!$anagrafica){
            return null;
        }
        return $anagrafica;
    }

    public function getAllAnagrafica(){
        return $this ->em->createQuery("SELECT  a FROM Anagrafica")->getResult();
    }

    public function addAnagrafica($anagrafica): int
    {
        if ($anagrafica instanceof Anagrafica) {


            $this->em->persist($anagrafica);
            $this->em->flush();
            $this->em->refresh($anagrafica);
            return $anagrafica -> getId();
        }
    return null;
}


}