<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lavoropersonaggi
 *
 * @ORM\Table(name="lavoropersonaggi", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nome_UNIQUE", columns={"nome"})})
 * @ORM\Entity
 */
class Lavoropersonaggi
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
     * @ORM\Column(name="descrizione", type="string", length=80, nullable=true)
     */
    private $descrizione;


}
