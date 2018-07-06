<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Foto
 *
 * @ORM\Table(name="foto", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nome_UNIQUE", columns={"nome"})}, indexes={@ORM\Index(name="id_tipofoto_idx", columns={"id_tipo"})})
 * @ORM\Entity
 */
class Foto
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=500, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="formato", type="string", length=6, nullable=false)
     */
    private $formato;

    /**
     * @var string
     *
     * @ORM\Column(name="datacreazione", type="string", length=45, nullable=false)
     */
    private $datacreazione;

    /**
     * @var \Tipigenerici
     *
     * @ORM\ManyToOne(targetEntity="Tipigenerici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * })
     */
    private $idTipo;


}
