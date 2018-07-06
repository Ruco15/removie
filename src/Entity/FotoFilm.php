<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FotoFilm
 *
 * @ORM\Table(name="foto_film", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id:filmfoto_idx", columns={"id_film"}), @ORM\Index(name="id_fotofilm_idx", columns={"id_foto"})})
 * @ORM\Entity
 */
class FotoFilm
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
     * @var \Foto
     *
     * @ORM\ManyToOne(targetEntity="Foto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_foto", referencedColumnName="id")
     * })
     */
    private $idFoto;


}
