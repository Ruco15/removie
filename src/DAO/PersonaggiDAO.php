<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 14:46
 */

namespace App\DAO;
use App\Entity\Personaggi;
use App\ExceptionPersonalizzate\RemovieException;
use App\Util\ErrorEnum;
use Doctrine\ORM\EntityManagerInterface;

class PersonaggiDAO
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

    public function getPersonaggioById($id){
        $personaggio = $this->em->find(Personaggi::class,$id);
        if($personaggio === null){
            throw new RemovieException("Personaggio non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
        }
        return $personaggio;

    }
}