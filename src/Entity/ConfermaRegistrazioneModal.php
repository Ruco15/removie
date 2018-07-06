<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 28/06/2018
 * Time: 12:29
 */

namespace App\Modal;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class ConfermaRegistrazioneModal
{

    /**
     * @var int
     * @Type("int")
     * @Assert\NotBlank()
     */
    private $idUser;
    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank()
     */
    private $codiceConferma;


    public function getIdUser()
    {
        return $this->idUser;
    }


    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }


    public function getCodiceConferma()
    {
        return $this->codiceConferma;
    }


    public function setCodiceConferma($codiceConferma): void
    {
        $this->codiceConferma = $codiceConferma;
    }

}

