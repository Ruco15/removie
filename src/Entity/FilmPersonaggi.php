<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
/**
 * FilmPersonaggi
 *
 * @ORM\Table(name="film_personaggi",  uniqueConstraints= {@ORM\UniqueConstraint(name="id_personaggio_UNIQUE", columns={"id_personaggio", "id_film", "id_lavoro"})}, indexes={@ORM\Index(name="id_lavperfilm_idx", columns={"id_lavoro"}), @ORM\Index(name="id_filmpers_idx", columns={"id_film"}), @ORM\Index(name="id_personaggifilm_idx", columns={"id_personaggio"})})
 * @ORM\Entity
 */
class FilmPersonaggi
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
     * @var Film
     * @JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Film", cascade={"merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film", referencedColumnName="id")
     * })
     */
    private $idFilm;

    /**
     * @var Lavoropersonaggi
     *
     * @ORM\ManyToOne(targetEntity="Lavoropersonaggi", cascade={"merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lavoro", referencedColumnName="id")
     * })
     */
    private $idLavoro;

    /**
     * @var Personaggi
     *
     * @ORM\ManyToOne(targetEntity="Personaggi", cascade={"merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personaggio", referencedColumnName="id")
     * })
     */
    private $idPersonaggio;

    /**
     * FilmPersonaggi constructor.
     */
    public function __construct()
    {
        $this->idPersonaggio = new ArrayCollection();
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
     * @return Film
     */
    public function getIdFilm(): Film
    {
        return $this->idFilm;
    }

    /**
     * @param Film $idFilm
     */
    public function setIdFilm(Film $idFilm): void
    {
        $this->idFilm = $idFilm;
    }

    /**
     * @return Lavoropersonaggi
     */
    public function getIdLavoro(): Lavoropersonaggi
    {
        return $this->idLavoro;
    }

    /**
     * @param Lavoropersonaggi $idLavoro
     */
    public function setIdLavoro(Lavoropersonaggi $idLavoro): void
    {
        $this->idLavoro = $idLavoro;
    }

    /**
     * @return Personaggi
     */
    public function getIdPersonaggio(): Personaggi
    {
        return $this->idPersonaggio;
    }

    /**
     * @param Personaggi $idPersonaggio
     */
    public function setIdPersonaggio(Personaggi $idPersonaggio): void
    {
        $this->idPersonaggio = $idPersonaggio;
    }


}
