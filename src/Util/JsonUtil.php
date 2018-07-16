<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 27/06/2018
 * Time: 10:34
 */

namespace App\Util;
use App\Entity\AbstractEntity;
use App\Entity\Utenti;
use App\ExceptionPersonalizzate\RemovieException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\UnsupportedFormatException;

use App\Modal\Errore;
use JMS\Serializer\SerializerBuilder;
class JsonUtil
{

    /**
     * JsonUtil constructor.
     */

    public static function deserializeJson($request, $entity){
       try{

           $serializer = SerializerBuilder::create()->build();
           $object = $serializer->deserialize($request, $entity, 'json');
        } catch (ValidationFailedException | UnsupportedFormatException  $e){
           throw new RemovieException($e->getMessage(),$e->getCode());
       }
       return $object;

    }

    public static function serializeJson($entity){
        $serializer = SerializerBuilder::create()->build();
        try{
            $jsonContent =  $serializer->serialize($entity, 'json');
        }catch (UnsupportedFormatException | Exception $e ){
            throw new RemovieException($e->getMessage(),$e->getCode());
        }

        return $jsonContent;
    }


}