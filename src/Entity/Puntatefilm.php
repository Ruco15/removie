<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Puntatefilm
 *
 * @ORM\Table(name="puntatefilm", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_serietv_idx", columns={"id_film"})})
 * @ORM\Entity
 */
class Puntatefilm
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
     * @var int
     *
     * @ORM\Column(name="numeropuntata", type="integer", nullable=false)
     */
    private $numeropuntata;

    /**
     * @var string
     *
     * @ORM\Column(name="titolo", type="string", length=100, nullable=false)
     */
    private $titolo;

    /**
     * @var string
     *
     * @ORM\Column(name="trama", type="string", length=500, nullable=false)
     */
    private $trama;

    /**
     * @var string
     *
     * @ORM\Column(name="datauscita", type="string", length=45, nullable=false)
     */
    private $datauscita;

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
     * @return int
     */
    public function getNumeropuntata(): int
    {
        return $this->numeropuntata;
    }

    /**
     * @param int $numeropuntata
     */
    public function setNumeropuntata(int $numeropuntata): void
    {
        $this->numeropuntata = $numeropuntata;
    }

    /**
     * @return string
     */
    public function getTitolo(): string
    {
        return $this->titolo;
    }

    /**
     * @param string $titolo
     */
    public function setTitolo(string $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * @return string
     */
    public function getTrama(): string
    {
        return $this->trama;
    }

    /**
     * @param string $trama
     */
    public function setTrama(string $trama): void
    {
        $this->trama = $trama;
    }

    /**
     * @return string
     */
    public function getDatauscita(): string
    {
        return $this->datauscita;
    }

    /**
     * @param string $datauscita
     */
    public function setDatauscita(string $datauscita): void
    {
        $this->datauscita = $datauscita;
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


}
