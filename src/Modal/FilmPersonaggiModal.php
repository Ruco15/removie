<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 14:19
 */

namespace App\Modal;


use App\Entity\Film;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class FilmPersonaggiModal
{
    /**
     * @var Film
     * @Type("App\Entity\Film")
     * @Assert\NotBlank()
     */
    private $film;

    /**
     * @var array
     * @Type("array<App\Modal\AttoreModal>")
     * @Assert\NotBlank()
     */
    private $listpersonaggi = array();
    /**
     * @var int
     * @Type("int")
     * @Assert\NotBlank()
     */
    private $produttore;

    /**
     * @return Film
     */
    public function getFilm(): Film
    {
        return $this->film;
    }

    /**
     * @param Film $film
     */
    public function setFilm(Film $film): void
    {
        $this->film = $film;
    }

    /**
     * @return array
     */
    public function getListpersonaggi(): array
    {
        return $this->listpersonaggi;
    }

    /**
     * @param array $listpersonaggi
     */
    public function setListpersonaggi(array $listpersonaggi): void
    {
        $this->listpersonaggi = $listpersonaggi;
    }

    /**
     * @return int
     */
    public function getProduttore(): int
    {
        return $this->produttore;
    }

    /**
     * @param int $produttore
     */
    public function setProduttore(int $produttore): void
    {
        $this->produttore = $produttore;
    }


}