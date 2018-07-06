<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produttori
 *
 * @ORM\Table(name="produttori", indexes={@ORM\Index(name="id_nazprod_idx", columns={"id_nazionalità"})})
 * @ORM\Entity
 */
class Produttori
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
     * @ORM\Column(name="nomecasaprod", type="string", length=100, nullable=false)
     */
    private $nomecasaprod;

    /**
     * @var string
     *
     * @ORM\Column(name="nomefondatore", type="string", length=60, nullable=false)
     */
    private $nomefondatore;

    /**
     * @var string
     *
     * @ORM\Column(name="cognomefondatore", type="string", length=70, nullable=false)
     */
    private $cognomefondatore;

    /**
     * @var string
     *
     * @ORM\Column(name="annodinascita", type="string", length=45, nullable=false)
     */
    private $annodinascita;

    /**
     * @var string
     *
     * @ORM\Column(name="storia", type="string", length=500, nullable=false)
     */
    private $storia;

    /**
     * @var \States
     *
     * @ORM\ManyToOne(targetEntity="States")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nazionalità", referencedColumnName="id")
     * })
     */
    private $idNazionalit�;


}
