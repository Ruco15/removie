<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrailerFilm
 *
 * @ORM\Table(name="trailer_film", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_filmtr_idx", columns={"id_film"}), @ORM\Index(name="id_trailer_idx", columns={"id_video"}), @ORM\Index(name="id_punttrai_idx", columns={"id_puntata"})})
 * @ORM\Entity
 */
class TrailerFilm
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
     * @var \Puntatefilm
     *
     * @ORM\ManyToOne(targetEntity="Puntatefilm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_puntata", referencedColumnName="id")
     * })
     */
    private $idPuntata;

    /**
     * @var \Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_video", referencedColumnName="id")
     * })
     */
    private $idVideo;


}
