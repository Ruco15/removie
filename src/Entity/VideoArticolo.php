<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoArticolo
 *
 * @ORM\Table(name="video_articolo", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_videorec_idx", columns={"id_video"}), @ORM\Index(name="id_artiolo_idx", columns={"id_articolo"})})
 * @ORM\Entity
 */
class VideoArticolo
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
     * @var \Articolo
     *
     * @ORM\ManyToOne(targetEntity="Articolo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_articolo", referencedColumnName="id")
     * })
     */
    private $idArticolo;

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
