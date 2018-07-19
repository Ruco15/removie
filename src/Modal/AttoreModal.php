<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/07/2018
 * Time: 14:24
 */

namespace App\Modal;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class AttoreModal
{
    /**
     * @var int
     * @Type("int")
     * @Assert\NotBlank()
     */
    private $idattore;
    /**
     * @var int
     * @Type("int")
     * @Assert\NotBlank()
     */
    private $idlavoro;

    /**
     * @return int
     */
    public function getIdattore(): int
    {
        return $this->idattore;
    }

    /**
     * @param int $idattore
     */
    public function setIdattore(int $idattore): void
    {
        $this->idattore = $idattore;
    }

    /**
     * @return int
     */
    public function getIdlavoro(): int
    {
        return $this->idlavoro;
    }

    /**
     * @param int $idlavoro
     */
    public function setIdlavoro(int $idlavoro): void
    {
        $this->idlavoro = $idlavoro;
    }


}