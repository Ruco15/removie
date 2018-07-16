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
private $idoscar;
    /**
     * @var string
     * @type("string")
     * @Assert\NotBlank()
     */
private $idtipo;
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
    public function getIdoscar()
    {
        return $this->idoscar;
    }

    /**
     * @param mixed $idoscar
     */
    public function setIdoscar($idoscar): void
    {
        $this->idoscar = $idoscar;
    }

    /**
     * @return mixed
     */
    public function getIdtipo()
    {
        return $this->idtipo;
    }

    /**
     * @param mixed $idtipo
     */
    public function setIdtipo($idtipo): void
    {
        $this->idtipo = $idtipo;
    }


}