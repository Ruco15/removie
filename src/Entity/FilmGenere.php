<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FilmGenere
 *
 * @ORM\Table(name="film_genere", uniqueConstraints={@ORM\UniqueConstraint(name="id_genere_UNIQUE", columns={"id_genere"}), @ORM\UniqueConstraint(name="id_film_UNIQUE", columns={"id_film"})}, indexes={@ORM\Index(name="id_gen_idx", columns={"id_genere"}), @ORM\Index(name="id_filmgen_idx", columns={"id_film"})})
 * @ORM\Entity
 */
class FilmGenere
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Film
     *
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film", referencedColumnName="id")
     * })
     */
    private $idFilm;

    /**
     * @var \Generi
     *
     * @ORM\ManyToOne(targetEntity="Generi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_genere", referencedColumnName="id")
     * })
     */
    private $idGenere;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \Film
     */
    public function getIdFilm(): \Film
    {
        return $this->idFilm;
    }

    /**
     * @param \Film $idFilm
     */
    public function setIdFilm(\Film $idFilm): void
    {
        $this->idFilm = $idFilm;
    }

    /**
     * @return \Generi
     */
    public function getIdGenere(): \Generi
    {
        return $this->idGenere;
    }

    /**
     * @param \Generi $idGenere
     */
    public function setIdGenere(\Generi $idGenere): void
    {
        $this->idGenere = $idGenere;
    }


}
