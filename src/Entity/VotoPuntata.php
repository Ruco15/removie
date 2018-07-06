<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VotoPuntata
 *
 * @ORM\Table(name="voto_puntata", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_puntatavoto_idx", columns={"id_puntata"}), @ORM\Index(name="id_utentevotopunt_idx", columns={"id_utente"})})
 * @ORM\Entity
 */
class VotoPuntata
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
     * @var \Puntatefilm
     *
     * @ORM\ManyToOne(targetEntity="Puntatefilm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_puntata", referencedColumnName="id")
     * })
     */
    private $idPuntata;

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
