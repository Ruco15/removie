<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OscarPersonaggi
 *
 * @ORM\Table(name="oscar_personaggi", uniqueConstraints={@ORM\UniqueConstraint(name="id_oscar_UNIQUE", columns={"id_oscar"}), @ORM\UniqueConstraint(name="id_personaggio_UNIQUE", columns={"id_personaggio"}), @ORM\UniqueConstraint(name="id_film_UNIQUE", columns={"id_film"})}, indexes={@ORM\Index(name="id_tipoosp_idx", columns={"id_tipo"})})
 * @ORM\Entity
 */
class OscarPersonaggi
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
     * @ORM\Column(name="anno", type="string", length=45, nullable=false)
     */
    private $anno;

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
     * @var \Premioscar
     *
     * @ORM\ManyToOne(targetEntity="Premioscar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oscar", referencedColumnName="id")
     * })
     */
    private $idOscar;

    /**
     * @var \Personaggi
     *
     * @ORM\ManyToOne(targetEntity="Personaggi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personaggio", referencedColumnName="id")
     * })
     */
    private $idPersonaggio;

    /**
     * @var \Tipigenerici
     *
     * @ORM\ManyToOne(targetEntity="Tipigenerici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * })
     */
    private $idTipo;

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
    public function getAnno(): string
    {
        return $this->anno;
    }

    /**
     * @param string $anno
     */
    public function setAnno(string $anno): void
    {
        $this->anno = $anno;
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
     * @return \Premioscar
     */
    public function getIdOscar(): \Premioscar
    {
        return $this->idOscar;
    }

    /**
     * @param \Premioscar $idOscar
     */
    public function setIdOscar(\Premioscar $idOscar): void
    {
        $this->idOscar = $idOscar;
    }

    /**
     * @return \Personaggi
     */
    public function getIdPersonaggio(): \Personaggi
    {
        return $this->idPersonaggio;
    }

    /**
     * @param \Personaggi $idPersonaggio
     */
    public function setIdPersonaggio(\Personaggi $idPersonaggio): void
    {
        $this->idPersonaggio = $idPersonaggio;
    }

    /**
     * @return \Tipigenerici
     */
    public function getIdTipo(): \Tipigenerici
    {
        return $this->idTipo;
    }

    /**
     * @param \Tipigenerici $idTipo
     */
    public function setIdTipo(\Tipigenerici $idTipo): void
    {
        $this->idTipo = $idTipo;
    }


}
