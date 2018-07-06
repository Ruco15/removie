<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Generi
 *
 * @ORM\Table(name="generi", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="nome_UNIQUE", columns={"nome"})})
 * @ORM\Entity
 */
class Generi
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return null|string
     */
    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    /**
     * @param null|string $descrizione
     */
    public function setDescrizione(?string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }


}
