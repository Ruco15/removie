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
        } catch (UnsupportedFormatException  $e){
            $errore = new Errore();
            $errore->setCode($e->getCode());
            $errore->setDescrizione($e->getMessage());
            return $errore;
       } catch(ValidationFailedException $e1){
           $errore = new Errore();
           $errore->setCode($e1->getCode());
           $errore->setDescrizione($e1->getMessage());
            return e1;

       }

        return $object;

    }

    public static function serializeJson($entity){
        $serializer = SerializerBuilder::create()->build();
        try{
            $jsonContent =  $serializer->serialize($entity, 'json');
        }catch (UnsupportedFormatException $e){
            $errore = new Errore();
            $errore->setCode($e->getCode());
            $errore->setDescrizione($e->getMessage());
            return $errore;
        } catch (Exception $e1){
            $errore = new Errore();
            $errore->setCode($e1->getCode());
            $errore->setDescrizione($e1->getMessage());
            return $errore;
        }

        return $jsonContent;
    }


}