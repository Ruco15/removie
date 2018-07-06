<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_topovideo_idx", columns={"id_tipo"}), @ORM\Index(name="id_utentevideo_idx", columns={"id_utente"})})
 * @ORM\Entity
 */
class Video
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
     * @ORM\Column(name="titolo", type="string", length=100, nullable=false)
     */
    private $titolo;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=1000, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=200, nullable=false)
     */
    private $descrizione;

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
