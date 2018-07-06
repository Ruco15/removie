<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipigenerici
 *
 * @ORM\Table(name="tipigenerici", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_tipo_idx", columns={"id_tipo"})})
 * @ORM\Entity
 */
class Tipigenerici
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
     * @ORM\Column(name="nome", type="string", length=60, nullable=false)
     */
    private $nome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descrizione", type="string", length=200, nullable=true)
     */
    private $descrizione;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_tipo", type="integer", nullable=true)
     */
    private $idTipo;

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

    /**
     * @return int|null
     */
    public function getIdTipo(): ?int
    {
        return $this->idTipo;
    }

    /**
     * @param int|null $idTipo
     */
    public function setIdTipo(?int $idTipo): void
    {
        $this->idTipo = $idTipo;
    }


}
