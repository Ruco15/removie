<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 27/06/2018
 * Time: 10:13
 */
namespace App\Modal;
class Errore{

   private $code;
   private $descrizione;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @param mixed $descrizione
     */
    public function setDescrizione($descrizione): void
    {
        $this->descrizione = $descrizione;
    }

}