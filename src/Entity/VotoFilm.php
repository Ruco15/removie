<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VotoFilm
 *
 * @ORM\Table(name="voto_film", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_utentevoto_idx", columns={"id_utente"}), @ORM\Index(name="id_filmvotato_idx", columns={"id_film"})})
 * @ORM\Entity
 */
class VotoFilm
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
     * @var \Film
     *
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film", referencedColumnName="id")
     * })
     */
    private $idFilm;

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
