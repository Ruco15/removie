<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articolo
 *
 * @ORM\Table(name="articolo", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_utente_idx", columns={"id_utente"}), @ORM\Index(name="id_recoart_idx", columns={"id_tipo"})})
 * @ORM\Entity
 */
class Articolo
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
     * @ORM\Column(name="descrizione", type="string", length=500, nullable=false)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="datacreazione", type="string", length=45, nullable=false)
     */
    private $datacreazione;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isVideo", type="boolean", nullable=true)
     */
    private $isvideo;

    /**
     * @var string
     *
     * @ORM\Column(name="testo", type="string", length=2500, nullable=false)
     */
    private $testo;

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
