<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produttori
 *
 * @ORM\Table(name="produttori", indexes={@ORM\Index(name="id_nazprod_idx", columns={"id_nazionalita"})})
 * @ORM\Entity
 */
class Produttori
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
     * @var string
     *
     * @ORM\Column(name="nomecasaprod", type="string", length=100, nullable=false)
     */
    private $nomecasaprod;

    /**
     * @var string
     *
     * @ORM\Column(name="nomefondatore", type="string", length=60, nullable=false)
     */
    private $nomefondatore;

    /**
     * @var string
     *
     * @ORM\Column(name="cognomefondatore", type="string", length=70, nullable=false)
     */
    private $cognomefondatore;

    /**
     * @var string
     *
     * @ORM\Column(name="annodinascita", type="string", length=45, nullable=false)
     */
    private $annodinascita;

    /**
     * @var string
     *
     * @ORM\Column(name="storia", type="string", length=500, nullable=false)
     */
    private $storia;

    /**
     * @var States
     *
     * @ORM\ManyToOne(targetEntity="States")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nazionalita", referencedColumnName="id")
     * })
     */
    private $idNazionalita;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Film", mappedBy="produttore")
     */
    private $films;

    /**
     * @return Collection
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * @param Collection $films
     */
    public function setFilms(Collection $films): void
    {
        $this->films = $films;
    }

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
     * @return string
     */
    public function getNomecasaprod(): string
    {
        return $this->nomecasaprod;
    }

    /**
     * @param string $nomecasaprod
     */
    public function setNomecasaprod(string $nomecasaprod): void
    {
        $this->nomecasaprod = $nomecasaprod;
    }

    /**
     * @return string
     */
    public function getNomefondatore(): string
    {
        return $this->nomefondatore;
    }

    /**
     * @param string $nomefondatore
     */
    public function setNomefondatore(string $nomefondatore): void
    {
        $this->nomefondatore = $nomefondatore;
    }

    /**
     * @return string
     */
    public function getCognomefondatore(): string
    {
        return $this->cognomefondatore;
    }

    /**
     * @param string $cognomefondatore
     */
    public function setCognomefondatore(string $cognomefondatore): void
    {
        $this->cognomefondatore = $cognomefondatore;
    }

    /**
     * @return string
     */
    public function getAnnodinascita(): string
    {
        return $this->annodinascita;
    }

    /**
     * @param string $annodinascita
     */
    public function setAnnodinascita(string $annodinascita): void
    {
        $this->annodinascita = $annodinascita;
    }

    /**
     * @return string
     */
    public function getStoria(): string
    {
        return $this->storia;
    }

    /**
     * @param string $storia
     */
    public function setStoria(string $storia): void
    {
        $this->storia = $storia;
    }

    /**
     * @return States
     */
    public function getIdNazionalita(): States
    {
        return $this->idNazionalita;
    }

    /**
     * @param States $idNazionalita
     */
    public function setIdNazionalita(States $idNazionalita): void
    {
        $this->idNazionalita = $idNazionalita;
    }


}
