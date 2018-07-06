<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VotoCinema
 *
 * @ORM\Table(name="voto_cinema", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_cinemavotato_idx", columns={"id_cinema"}), @ORM\Index(name="id_utentevotocinema_idx", columns={"id_utente"})})
 * @ORM\Entity
 */
class VotoCinema
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
     * @var int
     *
     * @ORM\Column(name="voto", type="integer", nullable=false)
     */
    private $voto;

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
     * @var \Utenti
     *
     * @ORM\ManyToOne(targetEntity="Utenti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utente", referencedColumnName="id")
     * })
     */
    private $idUtente;


}
