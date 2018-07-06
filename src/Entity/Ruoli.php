<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ruoli
 *
 * @ORM\Table(name="ruoli", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nome_UNIQUE", columns={"nome"})})
 * @ORM\Entity
 */
class Ruoli
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descrizione", type="string", length=100, nullable=true)
     */
    private $descrizione;


}
