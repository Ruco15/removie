<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 11/07/2018
 * Time: 11:45
 */

namespace App\Util;

/**
 * Class AnnotationTest
 * \@Annotation
 */
class AnnotationTest
{

    private $tipo;
    private $classe;
    private $isArray;

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe): void
    {
        $this->classe = $classe;
    }

    /**
     * @return mixed
     */
    public function getisArray()
    {
        return $this->isArray;
    }

    /**
     * @param mixed $isArray
     */
    public function setIsArray($isArray): void
    {
        $this->isArray = $isArray;
    }

}