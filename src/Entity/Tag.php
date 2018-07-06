<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="codice_UNIQUE", columns={"codice"})})
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="codice", type="string", length=70, nullable=false)
     */
    private $codice;

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
     * @return string
     */
    public function getCodice(): string
    {
        return $this->codice;
    }

    /**
     * @param string $codice
     */
    public function setCodice(string $codice): void
    {
        $this->codice = $codice;
    }


}
