<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 15:21
 */

namespace App\DAO;

use App\Entity\Produttori;
use Doctrine\ORM\EntityManagerInterface;
class ProduttoriDAO
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

    public function getProduttoreById($id){
        $produttore = $this->em->find(Produttori::class,$id);
        if($produttore === null){
            throw new RemovieException("Produttore non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
        }
        return $produttore;

    }
}