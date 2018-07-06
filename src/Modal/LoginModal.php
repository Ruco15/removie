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

class LoginModal
{

    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank()
     */
    private $username;
    /**
     * @var string
     * @Type("string")
     * @Assert\NotBlank()
     */
    private $password;


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

