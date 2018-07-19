<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticoloMipiace
 *
 * @ORM\Table(name="articolo_mipiace", uniqueConstraints={@ORM\UniqueConstraint(name="id_articolo_UNIQUE", columns={"id_articolo","id_utentes"}), indexes={@ORM\Index(name="id_utentemip_idx", columns={"id_utente"}), @ORM\Index(name="id_articolopiaciuto_idx", columns={"id_articolo"})})
 * @ORM\Entity
 */
class ArticoloMipiace
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
     * @var bool
     *
     * @ORM\Column(name="ismipiace", type="boolean", nullable=false)
     */
    private $ismipiace;

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
     * @var \Utenti
     *
     * @ORM\ManyToOne(targetEntity="Utenti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utente", referencedColumnName="id")
     * })
     */
    private $idUtente;


}
