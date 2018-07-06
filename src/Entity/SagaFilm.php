<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SagaFilm
 *
 * @ORM\Table(name="saga_film", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="id_filmsaga1_idx", columns={"id_film1"}), @ORM\Index(name="id_filmsaga2_idx", columns={"id_film2"})})
 * @ORM\Entity
 */
class SagaFilm
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
     * @var int
     *
     * @ORM\Column(name="ordine1", type="integer", nullable=false)
     */
    private $ordine1;

    /**
     * @var int
     *
     * @ORM\Column(name="ordine2", type="integer", nullable=false)
     */
    private $ordine2;

    /**
     * @var \Film
     *
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film1", referencedColumnName="id")
     * })
     */
    private $idFilm1;

    /**
     * @var \Film
     *
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film2", referencedColumnName="id")
     * })
     */
    private $idFilm2;


}
