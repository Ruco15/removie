<?php

namespace App\Entity;
use JMS\Serializer\Annotation as JMS;
use App\ExceptionPersonalizzate\RemovieException;
use Doctrine\ORM\Mapping as ORM;

/**
 * TagColl
 *
 * @ORM\Table(name="tag_coll", uniqueConstraints={@ORM\UniqueConstraint(name="id_video_UNIQUE", columns={"id_video","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_articolo_UNIQUE", columns={"id_articolo","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_foto_UNIQUE", columns={"id_foto","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_personaggio_UNIQUE", columns={"id_personaggio","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_produttore_UNIQUE", columns={"id_produttore","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_cinema_UNIQUE", columns={"id_cinema","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_film_UNIQUE", columns={"id_film","id_tag"}),
 *     @ORM\UniqueConstraint(name="id_puntata_UNIQUE", columns={"id_puntata","id_tag"})
 *     }
 *     , indexes={@ORM\Index(name="id_prodtag_idx", columns={"id_produttore"}), @ORM\Index(name="id_articolotag_idx", columns={"id_articolo"}), @ORM\Index(name="id_videotag_idx", columns={"id_video"}), @ORM\Index(name="id_fototag_idx", columns={"id_foto"}), @ORM\Index(name="id_tag_idx", columns={"id_tag"}), @ORM\Index(name="id_personaggiotag_idx", columns={"id_personaggio"}), @ORM\Index(name="id_cinematag_idx", columns={"id_cinema"}), @ORM\Index(name="id_puntatatag_idx", columns={"id_puntata"}), @ORM\Index(name="id_filmtag_idx", columns={"id_film"})})
 * @ORM\Entity
 */
class TagColl
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
     * @var Articolo
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Articolo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_articolo", referencedColumnName="id")
     * })
     */
    private $idArticolo;

    /**
     * @var Cinema
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Cinema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cinema", referencedColumnName="id")
     * })
     */
    private $idCinema;

    /**
     * @var Film
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film", referencedColumnName="id")
     * })
     */
    private $idFilm;

    /**
     * @var Foto
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Foto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_foto", referencedColumnName="id")
     * })
     */
    private $idFoto;

    /**
     * @var Personaggi
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Personaggi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personaggio", referencedColumnName="id")
     * })
     */
    private $idPersonaggio;

    /**
     * @var Produttori
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Produttori")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produttore", referencedColumnName="id")
     * })
     */
    private $idProduttore;

    /**
     * @var Puntatefilm
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Puntatefilm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_puntata", referencedColumnName="id")
     * })
     */
    private $idPuntata;

    /**
     * @var Tag
     *
     * @ORM\ManyToOne(targetEntity="Tag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tag", referencedColumnName="id")
     * })
     */
    private $idTag;

    /**
     * @var Video
     *@JMS\Exclude()
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_video", referencedColumnName="id")
     * })
     */
    private $idVideo;

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
     * @return Articolo
     */
    public function getIdArticolo(): Articolo
    {
        return $this->idArticolo;
    }

    /**
     * @param Articolo $idArticolo
     */
    public function setIdArticolo(Articolo $idArticolo): void
    {
        $this->idArticolo = $idArticolo;
    }

    /**
     * @return Cinema
     */
    public function getIdCinema(): Cinema
    {
        return $this->idCinema;
    }

    /**
     * @param Cinema $idCinema
     */
    public function setIdCinema(Cinema $idCinema): void
    {
        $this->idCinema = $idCinema;
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
     * @return Foto
     */
    public function getIdFoto(): Foto
    {
        return $this->idFoto;
    }

    /**
     * @param Foto $idFoto
     */
    public function setIdFoto(Foto $idFoto): void
    {
        $this->idFoto = $idFoto;
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

    /**
     * @return Produttori
     */
    public function getIdProduttore(): Produttori
    {
        return $this->idProduttore;
    }

    /**
     * @param Produttori $idProduttore
     */
    public function setIdProduttore(Produttori $idProduttore): void
    {
        $this->idProduttore = $idProduttore;
    }

    /**
     * @return Puntatefilm
     */
    public function getIdPuntata(): Puntatefilm
    {
        return $this->idPuntata;
    }

    /**
     * @param Puntatefilm $idPuntata
     */
    public function setIdPuntata(Puntatefilm $idPuntata): void
    {
        $this->idPuntata = $idPuntata;
    }

    /**
     * @return Tag
     */
    public function getIdTag(): Tag
    {
        return $this->idTag;
    }

    /**
     * @param Tag $idTag
     */
    public function setIdTag(Tag $idTag): void
    {
        $this->idTag = $idTag;
    }

    /**
     * @return Video
     */
    public function getIdVideo(): Video
    {
        return $this->idVideo;
    }

    /**
     * @param Video $idVideo
     */
    public function setIdVideo(Video $idVideo): void
    {
        $this->idVideo = $idVideo;
    }

    /**
     * Tag constructor.
     */
    public function __construct($object, $tag)
    {
        switch (true) {
            case $object instanceof Film:
                $this->setIdFilm($object);
                break;
            case $object instanceof Video:
                $this->setIdVideo($object);
                break;
            case $object instanceof Foto:
                $this->setIdVideo($object);
                break;
            case $object instanceof Articolo:
                $this->setIdArticolo($object);
                break;
            case $object instanceof Personaggi:
                $this->setIdPersonaggio($object);
                break;
            case $object instanceof Produttori:
                $this->setIdProduttore($object);
                break;
            case $object instanceof Puntatefilm:
                $this->setIdPuntata($object);
                break;
            case $object instanceof Cinema:
                $this->setIdCinema($object);
                break;
            default:
                throw new RemovieException("l'oggetto non corrisponde",1);

        }

        $this->setIdTag($tag);
    }


}
