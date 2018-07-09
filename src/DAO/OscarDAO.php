<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 09/07/2018
 * Time: 11:19
 */

namespace App\DAO;

use App\Entity\Premioscar;
use Doctrine\ORM\EntityManagerInterface;


class OscarDAO
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

    public function getOscarById($id): Premioscar{
        $oscar = $this->em->find(Premioscar::class,$id);
        if($oscar ==null){
            throw new RemovieException("Premio Oscar non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
        }
        return $oscar;
    }
}