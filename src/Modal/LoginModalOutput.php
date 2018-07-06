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

class LoginModalOutput
{


    private $username;

    private $password;

    private $ruolo;

    /**
     * @return mixed
     */
    public function getRuolo()
    {
        return $this->ruolo;
    }

    /**
     * @param mixed $ruolo
     */
    public function setRuolo($ruolo): void
    {
        $this->ruolo = $ruolo;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username): void
    {
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

}

