<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticoloFilm
 *
 * @ORM\Table(name="articolo_film", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_recensionefilm_idx", columns={"id_articolo"}), @ORM\Index(name="id_filmrecensito_idx", columns={"id_film"}), @ORM\Index(name="id_puntatarecensita_idx", columns={"id_puntata"})})
 * @ORM\Entity
 */
class ArticoloFilm
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
     * @var \Articolo
     *
     * @ORM\ManyToOne(targetEntity="Articolo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_articolo", referencedColumnName="id")
     * })
     */
    private $idArticolo;


}
