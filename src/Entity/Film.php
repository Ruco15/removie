<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Film
 *
 * @ORM\Table(name="film", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_tip_idx", columns={"id_tipo"})})
 * @ORM\Entity
 */
class Film
{
    /**
     * @var int
     * @Type ("int")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;

    /**
     * @var string
     * @Type ("string")
     * @ORM\Column(name="titolo", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $titolo;

    /**
     * @var string
     *@Type ("string")
     * @Assert\NotBlank()
     * @ORM\Column(name="trama", type="string", length=1500, nullable=false)
     */
    private $trama;

    /**
     * @var string
     *@Type ("string")
     * @Assert\NotBlank()
     * @ORM\Column(name="datadiuscita", type="string", length=45, nullable=false)
     */
    private $datadiuscita;

    /**
     * @var bool
     *@Type ("bool")

     * @ORM\Column(name="isNew", type="boolean", nullable=true)
     */
    private $isnew = false;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntate", type="integer", nullable=true)
     */
    private $puntate;

    /**
     * @var Tipigenerici
     *
     *@Type ("App\Entity\Tipigenerici")
     * @ORM\ManyToOne(targetEntity="Tipigenerici", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * })
     */
    private $idTipo;
/**
 *
 * @var ArrayCollection
 * @Type("ArrayCollection<App\Entity\FilmPersonaggi>")
 * @ORM\OneToMany(targetEntity="App\Entity\FilmPersonaggi", mappedBy="idFilm", cascade={"persist"})
     */
    private $filmPersonaggio;

    /**
     * @var Produttori
     * @Type("App\Entity\Produttori")
     * @ORM\ManyToOne(targetEntity="App\Entity\Produttori", inversedBy="films")
     * @ORM\JoinColumn(name="id_produttore", referencedColumnName="id")
     */
    private $produttore;

    /**
     * @return Produttori
     */
    public function getProduttore(): Produttori
    {
        return $this->produttore;
    }

    /**
     * @param Produttori $produttore
     */
    public function setProduttore(Produttori $produttore): void
    {
        $this->produttore = $produttore;
    }




    /**
     * @return ArrayCollection
     */
    public function getFilmPersonaggio()
    {

        return $this->filmPersonaggio;
    }

    /**
     * @param ArrayCollection $filmPersonaggio
     */
    public function setFilmPersonaggio(ArrayCollection $filmPersonaggio): void
    {
        $this->filmPersonaggio = $filmPersonaggio;
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
    public function getDatadiuscita(): string
    {
        return $this->datadiuscita;
    }

    /**
     * @param string $datadiuscita
     */
    public function setDatadiuscita(string $datadiuscita): void
    {
        $this->datadiuscita = $datadiuscita;
    }

    /**
     * @return bool
     */
    public function isIsnew(): bool
    {
        return $this->isnew;
    }

    /**
     * @param bool $isnew
     */
    public function setIsnew(bool $isnew): void
    {
        $this->isnew = $isnew;
    }

    /**
     * @return int|null
     */
    public function getPuntate(): ?int
    {
        return $this->puntate;
    }

    /**
     * @param int|null $puntate
     */
    public function setPuntate(?int $puntate): void
    {
        $this->puntate = $puntate;
    }

    /**
     * @return Tipigenerici
     */
    public function getIdTipo(): Tipigenerici
    {
        return $this->idTipo;
    }

    /**
     * @param Tipigenerici $idTipo
     */
    public function setIdTipo(Tipigenerici $idTipo): void
    {
        $this->idTipo = $idTipo;
    }



}
