<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Utenti
 *
 * @ORM\Table(name="utenti", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@ORM\Index(name="id_ruolo_idx", columns={"id_ruolo"}), @ORM\Index(name="id_avatar_idx", columns={"id_avatar"}), @ORM\Index(name="id_anagut_idx", columns={"id_anag"})})
 * @ORM\Entity
 */
class Utenti
{
    /**
     * @Assert\Blank()
     * @var int
     * @Type("int")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Type("string")
     * @var string
     *@Assert\NotBlank()
     * @ORM\Column(name="username", type="string", length=16, nullable=false)
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="password", type="string", length=500, nullable=false)
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @Assert\Blank()
     * @var string
     *@Type("string")
     * @ORM\Column(name="datacreazione", type="string", length=45, nullable=false)
     */
    private $datacreazione;

    /**
     * @Assert\Blank()
     * @var bool
     *@Type("boolean")
     * @ORM\Column(name="isActive", type="boolean", nullable=false)
     */
    private $isactive;

    /**
     * @Assert\NotBlank()
     * @var \Anagrafica
     *@Type("App\Entity\Anagrafica")
     * @ORM\OneToOne(targetEntity="Anagrafica",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_anag", referencedColumnName="id")
     * })
     */
    private $anagrafica;

    /**
     *
     * @var \Foto
     *@Type("App\Entity\Foto")
     * @ORM\ManyToOne(targetEntity="Foto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_avatar", referencedColumnName="id")
     * })
     */
    private $idAvatar;

    /**
     * @Assert\Blank()
     * @var \Ruoli
     *@Type("App\Entity\Ruoli")
     * @ORM\OneToOne(targetEntity="Ruoli")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ruolo", referencedColumnName="id")
     * })
     */
    private $idRuolo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDatacreazione(): ?string
    {
        return $this->datacreazione;
    }

    public function setDatacreazione(string $datacreazione): self
    {
        $this->datacreazione = $datacreazione;

        return $this;
    }

    public function getIsactive(): ?bool
    {
        return $this->isactive;
    }

    public function setIsactive(bool $isactive): self
    {
        $this->isactive = $isactive;

        return $this;
    }

    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    public function setAnagrafica(?Anagrafica $anagrafica): self
    {
        $this->anagrafica = $anagrafica;

        return $this;
    }

    public function getIdAvatar(): ?Foto
    {
        return $this->idAvatar;
    }

    public function setIdAvatar(?Foto $idAvatar): self
    {
        $this->idAvatar = $idAvatar;

        return $this;
    }

    public function getIdRuolo(): ?Ruoli
    {
        return $this->idRuolo;
    }

    public function setIdRuolo(?Ruoli $idRuolo): self
    {
        $this->idRuolo = $idRuolo;

        return $this;
    }


}
