<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LavoropersonaggiPersonaggi
 *
 * @ORM\Table(name="lavoropersonaggi_personaggi", uniqueConstraints={@ORM\UniqueConstraint(name="id_lavoro_UNIQUE", columns={"id_lavoro"}), @ORM\UniqueConstraint(name="id_personaggio_UNIQUE", columns={"id_personaggio"})}, indexes={@ORM\Index(name="id_lavorop_idx", columns={"id_lavoro"}), @ORM\Index(name="id_personaggio_idx", columns={"id_personaggio"})})
 * @ORM\Entity
 */
class LavoropersonaggiPersonaggi
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
     * @var \Lavoropersonaggi
     *
     * @ORM\ManyToOne(targetEntity="Lavoropersonaggi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lavoro", referencedColumnName="id")
     * })
     */
    private $idLavoro;

    /**
     * @var \Personaggi
     *
     * @ORM\ManyToOne(targetEntity="Personaggi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personaggio", referencedColumnName="id")
     * })
     */
    private $idPersonaggio;


}
