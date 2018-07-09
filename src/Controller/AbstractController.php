<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 15:23
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class  AbstractController extends Controller
{


    public function getLog(){

        return $this->get('logger')->getLogger();
    }
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
        return  $this->container->get("oscarfilmdao.service");;
    }

    /**
     * @return mixed
     */
    public function getTagDao()
    {
        return  $this->container->get("tagdao.service");;
    }

    /**
     * @return mixed
     */
    public function getTagCollDao()
    {
        return  $this->container->get("tagcolldao.service");;
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

}