<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personaggi
 *
 * @ORM\Table(name="personaggi", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_nazionalita_idx", columns={"id_nazionalita"})})
 * @ORM\Entity
 */
class Personaggi
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
     * @ORM\Column(name="nome", type="string", length=70, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cognome", type="string", length=80, nullable=false)
     */
    private $cognome;

    /**
     * @var string
     *
     * @ORM\Column(name="datadinascita", type="string", length=45, nullable=false)
     */
    private $datadinascita;

    /**
     * @var \States
     *
     * @ORM\ManyToOne(targetEntity="States")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nazionalita", referencedColumnName="id")
     * })
     */
    private $idNazionalita;


}
