<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FotoPuntate
 *
 * @ORM\Table(name="foto_puntate", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_puntfot_idx", columns={"id_puntata"}), @ORM\Index(name="id_foto_idx", columns={"id_foto"})})
 * @ORM\Entity
 */
class FotoPuntate
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
     * @var \Foto
     *
     * @ORM\ManyToOne(targetEntity="Foto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_foto", referencedColumnName="id")
     * })
     */
    private $idFoto;

    /**
     * @var \Puntatefilm
     *
     * @ORM\ManyToOne(targetEntity="Puntatefilm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_puntata", referencedColumnName="id")
     * })
     */
    private $idPuntata;


}
