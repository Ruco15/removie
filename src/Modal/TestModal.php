<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 11/07/2018
 * Time: 11:45
 */

namespace App\Modal;
use App\Util\AnnotationTest;
use JMS\Serializer\Annotation\Type;
class TestModal
{
    /**
     * @AnnotationTest(tipo = "string")
     * @Type("string")
     * @var "string"
     */
    public $nome;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }


}