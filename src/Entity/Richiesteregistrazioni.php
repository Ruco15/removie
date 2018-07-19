<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Richiesteregistrazioni
 *
 * @ORM\Table(name="richiesteregistrazioni", uniqueConstraints={@ORM\UniqueConstraint(name="id_utente_UNIQUE", columns={"id_utente"})}, indexes={@ORM\Index(name="id_userrichiesta_idx", columns={"id_utente"})})
 * @ORM\Entity
 */
class Richiesteregistrazioni
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
     * @ORM\Column(name="codice", type="string", length=8, nullable=false)
     */
    private $codice;

    /**
     * @var bool
     *
     * @ORM\Column(name="isvalid", type="boolean", nullable=false)
     */
    private $isValid;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid(bool $isValid): void
    {
        $this->isValid = $isValid;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="datarichiesta", type="string", length=45, nullable=false)
     */
    private $datarichiesta;

    /**
     * @var \Utenti
     *
     * @ORM\ManyToOne(targetEntity="Utenti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utente", referencedColumnName="id")
     * })
     */
    private $idUtente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodice(): ?string
    {
        return $this->codice;
    }

    public function setCodice(string $codice): self
    {
        $this->codice = $codice;

        return $this;
    }

    public function getDatarichiesta(): ?string
    {
        return $this->datarichiesta;
    }

    public function setDatarichiesta(string $datarichiesta): self
    {
        $this->datarichiesta = $datarichiesta;

        return $this;
    }

    public function getIdUtente(): ?Utenti
    {
        return $this->idUtente;
    }

    public function setIdUtente(?Utenti $idUtente): self
    {
        $this->idUtente = $idUtente;

        return $this;
    }


}
