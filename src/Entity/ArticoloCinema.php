<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticoloCinema
 *
 * @ORM\Table(name="articolo_cinema", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_recensionecinema_idx", columns={"id_articolo"}), @ORM\Index(name="id_cinemarecensito_idx", columns={"id_cinema"})})
 * @ORM\Entity
 */
class ArticoloCinema
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
     * @var \Cinema
     *
     * @ORM\ManyToOne(targetEntity="Cinema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cinema", referencedColumnName="id")
     * })
     */
    private $idCinema;

    /**
     * @var \Articolo
     *
     * @ORM\ManyToOne(targetEntity="Articolo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_articolo", referencedColumnName="id")
     * })
     */
    private $idArticolo;


}
