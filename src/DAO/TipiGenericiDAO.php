<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 09/07/2018
 * Time: 14:04
 */

namespace App\DAO;

use App\Entity\Tipigenerici;
use App\ExceptionPersonalizzate\RemovieException;
use App\Util\ErrorEnum;
use Doctrine\ORM\EntityManagerInterface;
class TipiGenericiDAO
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

    public function getTipoGenericoByName($nome):Tipigenerici{
            $query = $this->em->createQuery("SELECT t FROM App\Entity\Tipigenerici t WHERE t.nome = :nome");
            $query->setParameter("nome",$nome);
            $tipo = $query->getResult();
            if(count($tipo) == 0){
                throw new RemovieException("Tipo Generico non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
            }
            return $tipo[0];
    }
}