<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinema
 *
 * @ORM\Table(name="cinema", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_cittacinema_idx", columns={"id_citta"})})
 * @ORM\Entity
 */
class Cinema
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
     * @ORM\Column(name="nome", type="string", length=80, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="indirizzo", type="string", length=200, nullable=false)
     */
    private $indirizzo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numerosale", type="integer", nullable=true)
     */
    private $numerosale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="giorniapertura", type="string", length=45, nullable=true)
     */
    private $giorniapertura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="orariapertura", type="string", length=45, nullable=true)
     */
    private $orariapertura;

    /**
     * @var \Cities
     *
     * @ORM\ManyToOne(targetEntity="Cities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_citta", referencedColumnName="id")
     * })
     */
    private $idCitta;


}
