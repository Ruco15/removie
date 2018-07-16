<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 15:23
 */

namespace App\Controller;


use App\ExceptionPersonalizzate\RemovieException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class  AbstractController extends Controller
{



    /**
     * @return mixed
     */
    public function getEm()
    {

        return $this->getDoctrine()->getManager();
    }

    /**
     * @return mixed
     */
    public function getFilmDao()
    {
        return  $this->container->get("service.filmdao");
    }

    /**
     * @return mixed
     */
    public function getOscarFilmDao()
    {
        return  $this->container->get("service.oscarfilmdao");
    }

    /**
     * @return mixed
     */
    public function getTagDao()
    {
        return  $this->container->get("service.tagdao");
    }

    /**
     * @return mixed
     */
    public function getTagCollDao()
    {
        return  $this->container->get("service.tagcolldao");
    }

    /**
     * @return mixed
     */
    public function getFilmGenereDao()
    {
        return  $this->container->get("service.filmgeneredao");
    }

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator = $this->container->get('validator');
    }

    /**
     * @return mixed
     */
    public function getUtentiDAO()
    {
        return $this->container->get('service.utenti');
    }

    /**
     * @return mixed
     */
    public function getRichiesteDAO()
    {
        return  $this->container->get('service.richiesteregistrazioni');
    }

    public function getGenereDAO()
    {
        return  $this->container->get('service.generedao');
    }

    public function getOscarDAO()
    {
        return  $this->container->get('service.oscardao');
    }
    /**
     * @return mixed
     */
    public function getSendEmail()
    {
        return $this->container->get("service.sendemail");
    }

    public function  getSession(){
        return new Session();
    }

    public function getTipiGenericiDAO(){
        return $this->container->get('service.tipidao');
    }

    protected function validator($object,$nameClass){
        $validator = $this->getValidator()->validate($object);
        if(count($validator) !==0){
            throw new RemovieException("Inserisci tutte le informazioni inertenti".$nameClass,1);
        }
    }
}