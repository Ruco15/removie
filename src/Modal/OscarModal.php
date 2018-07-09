<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 09/07/2018
 * Time: 14:15
 */

namespace App\Modal;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class OscarModal
{
    /**
     * @var int
     * @type("int")
     * @Assert\NotBlank()
     */
private $idOscar;
    /**
     * @var string
     * @type("string")
     * @Assert\NotBlank()
     */
private $idTipo;
    /**
     * @var string
     * @type("string")
     * @Assert\NotBlank()
     */
private $anno;

    /**
     * @return mixed
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * @param mixed $anno
     */
    public function setAnno($anno): void
    {
        $this->anno = $anno;
    }


    /**
     * @return mixed
     */
    public function getIdOscar()
    {
        return $this->idOscar;
    }

    /**
     * @param mixed $idOscar
     */
    public function setIdOscar($idOscar): void
    {
        $this->idOscar = $idOscar;
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param mixed $idTipo
     */
    public function setIdTipo($idTipo): void
    {
        $this->idTipo = $idTipo;
    }


}