<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Anagrafica
 *
 * @ORM\Table(name="anagrafica", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), indexes={@ORM\Index(name="id_citta_idx", columns={"id_citta"})})
 * @ORM\Entity
 */
class Anagrafica
{
    /**
     * @var int
     * @Assert\Blank()
     *@Type("int")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="Nome", type="string", length=70, nullable=false)
     */
    private $nome;

    /**
     * @Assert\NotBlank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="Cognome", type="string", length=150, nullable=false)
     */
    private $cognome;

    /**
     * @Assert\NotBlank()
     * @var string|null
     *@Type("string")
     * @ORM\Column(name="Datadinascita", type="string", length=25, nullable=false)
     */
    private $datadinascita;

    /**
     * @Assert\NotBlank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="Indirizzo", type="string", length=300, nullable=false)
     */
    private $indirizzo;

    /**
     * @Assert\NotBlank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="Cellulare", type="string", length=45, nullable=false)
     */
    private $cellulare;

    /**
     *
     * @var \Cities
     *@Type("App\Entity\Cities")
     * @ORM\ManyToOne(targetEntity="Cities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_citta", referencedColumnName="id")
     * })
     */
    private $idCitta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): self
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getDatadinascita(): ?string
    {
        return $this->datadinascita;
    }

    public function setDatadinascita(?string $datadinascita): self
    {
        $this->datadinascita = $datadinascita;

        return $this;
    }

    public function getIndirizzo(): ?string
    {
        return $this->indirizzo;
    }

    public function setIndirizzo(string $indirizzo): self
    {
        $this->indirizzo = $indirizzo;

        return $this;
    }

    public function getCellulare(): ?string
    {
        return $this->cellulare;
    }

    public function setCellulare(string $cellulare): self
    {
        $this->cellulare = $cellulare;

        return $this;
    }

    public function getIdCitta(): ?Cities
    {
        return $this->idCitta;
    }

    public function setIdCitta(?Cities $idCitta): self
    {
        $this->idCitta = $idCitta;

        return $this;
    }


}
