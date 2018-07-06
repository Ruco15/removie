<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 26/06/2018
 * Time: 14:08
 */

namespace App\DAO;

use App\Entity\Richiesteregistrazioni;
use App\Entity\Ruoli;
use Doctrine\ORM\EntityManagerInterface;
use App\Modal\Errore;

class RichiesteRegistrazioniDAO
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

    public function addRichiesteRegistrazioni($richiesta): Richiesteregistrazioni
    {
        if ($richiesta instanceof Richiesteregistrazioni) {
            $this->em->persist($richiesta);
            $this->em->flush();
            $this->em->refresh($richiesta);
            return $richiesta;
        }

        return null;

    }

    public function updateRichiestaRegistrazione($richiesta): Richiesteregistrazioni
    {
        if ($richiesta instanceof Richiesteregistrazioni) {
            $this->em->merge($richiesta);
            $this->em->flush();
            $this->em->refresh($richiesta);
            return $richiesta;
        }

        return null;

    }

    public function getRichiestaByIdUtente($idUtente)
    {

        $query = $this->em->createQuery("SELECT r FROM App\Entity\Richiesteregistrazioni r WHERE r.idUtente = :id and r.isValid = 1");
        $query->setParameter("id", $idUtente);
        $registrazione = $query->getResult();
        if ($registrazione != null) {
            return $registrazione;
        } else {
            $errore = new Errore();
            $errore->setCode("2");
            $errore->setDescrizione("Richiesta non trovata");
            return $errore;
        }
    }


}