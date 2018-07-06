<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 28/06/2018
 * Time: 10:11
 */

namespace App\Util;


use PhpParser\Node\Scalar\String_;

class NumberUtil
{


    public static function generateRandomNumber($length):string{
        $code ="";
        for ($i=0; $i<$length;$i++){
            $code .= strval(rand(0,9));
        }
        return $code;
    }
}