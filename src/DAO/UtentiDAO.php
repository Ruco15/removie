<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 26/06/2018
 * Time: 14:08
 */

namespace App\DAO;

use App\Entity\Utenti;
use App\Modal\Errore;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use App\Entity\Anagrafica;

class UtentiDAO
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

    public function getUtentiById($idUtente)
    {
        $utente = $this->em->find("App\Entity\Utenti", $idUtente);

        if ($utente == null){
            $errore = new Errore();
            $errore->setCode("1");
            $errore->setDescrizione("Utente non trovato");
            return $errore;
        }
        return $utente;
    }

    public function getAllUtenti()
    {
        return $this->em->createQuery("SELECT  a FROM Utenti a")->getResult();
    }

    public function addUtenti($utente): Utenti
    {
        if ($utente instanceof Utenti) {

                $this->em->persist($utente);
                $this->em->flush();
                $this->em->refresh($utente);
                $this->em->refresh($utente->getAnagrafica());

            return $utente;
        }
        return null;
    }

    public function updateUtente($utente)
    {
        $this->em->merge($utente);
        $this->em->flush();
        $this->em->refresh($utente);
    }

    public function getUtenteByUsername($user)
    {
        $query = $this->em->createQuery("SELECT  u FROM Utenti u WHERE LOWER(u.username) = :user");
        $query->setParameter("user", strtolower($user));
        return $query->getResult();
    }

    public function getUtenteForLogin($loginModal){
        $query = $this->em->createQuery("SELECT  u FROM App\Entity\Utenti u WHERE LOWER(u.username) = :user and u.password = :pass");
        $query->setParameter("user", strtolower($loginModal->getUsername()));
        $query->setParameter("pass", $loginModal->getPassword());
        $utente = $query->getResult();
        if($utente == null){
            $errore = new Errore();
            $errore ->setCode("1");
            $errore -> setDescrizione("Utente non trovato");
            return $errore;
        }
        return $utente;
    }
}