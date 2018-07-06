<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FilmProduttore
 *
 * @ORM\Table(name="film_produttore", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="id_film_UNIQUE", columns={"id_film"}), @ORM\UniqueConstraint(name="id_produttore_UNIQUE", columns={"id_produttore"})}, indexes={@ORM\Index(name="id_filmprod_idx", columns={"id_film"}), @ORM\Index(name="id_prodfilm_idx", columns={"id_produttore"})})
 * @ORM\Entity
 */
class FilmProduttore
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
     * @var \Produttori
     *
     * @ORM\ManyToOne(targetEntity="Produttori")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produttore", referencedColumnName="id")
     * })
     */
    private $idProduttore;

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
     * @return \Produttori
     */
    public function getIdProduttore(): \Produttori
    {
        return $this->idProduttore;
    }

    /**
     * @param \Produttori $idProduttore
     */
    public function setIdProduttore(\Produttori $idProduttore): void
    {
        $this->idProduttore = $idProduttore;
    }


}
