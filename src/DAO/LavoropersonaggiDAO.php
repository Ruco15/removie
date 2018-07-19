<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 14:57
 */

namespace App\DAO;
use App\Entity\Lavoropersonaggi;
use App\Entity\LavoropersonaggiPersonaggi;
use Doctrine\ORM\EntityManagerInterface;

class LavoropersonaggiDAO
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

    public function getLavoroById($id){
        $lavoro = $this->em->find(Lavoropersonaggi::class,$id);
        if($lavoro === null){
            throw new RemovieException("lavoro non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
        }
        return $lavoro;

    }
}