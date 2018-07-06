<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FotoArticolo
 *
 * @ORM\Table(name="foto_articolo", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_foto_idx", columns={"id_foto"}), @ORM\Index(name="id_articolo_idx", columns={"id_articolo"})})
 * @ORM\Entity
 */
class FotoArticolo
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
     * @var \Foto
     *
     * @ORM\ManyToOne(targetEntity="Foto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_foto", referencedColumnName="id")
     * })
     */
    private $idFoto;


}
