<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 12:02
 */

namespace App\DAO;


use App\Entity\Film;
use App\ExceptionPersonalizzate\RemovieException;
use App\Util\ErrorEnum;
use Doctrine\ORM\EntityManagerInterface;
use function PhpParser\filesInDir;

class FilmDAO
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

    public function createFilm(Film $film):Film{

        $this->em ->persist($film);
        $this->em->flush();
        $this->em->refresh($film);
        return $film;
    }

    public function getFilmById($id){
        $film = $this->em->find(Film::class,$id);
        if($film === null){
            throw new RemovieException("Film non trovato", ErrorEnum::OGGETTO_NON_TROVATO);
        }
        return $film;
    }

    public function updateFilm($film){
        $this->em->merge($film);
        $this->em->flush();
        $this->em->refresh($film);
        return $film;
    }
}