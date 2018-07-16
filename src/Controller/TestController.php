<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 11/07/2018
 * Time: 11:43
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class TestController extends AbstractController
{

    /**
     * @Route("/test")
     */
    public function test(Request $request)
    {
        $namespace = "App\\Util\\";
        $class = new \ReflectionClass("App\Modal\TestModal");
        $request = $request->getContent();
        $request = str_replace("\n", ".", $request);
        $request = str_replace("{", ".", $request);
        $request = str_replace("}", ".", $request);
        $request = str_replace(" ", ".", $request);
        $request = str_replace("\"", ".", $request);
        $request = str_replace(":", ".", $request);
        $arrayReq = explode(".", $request);
        $g = 0;
        for ($l = 0; $l < count($arrayReq); $l++) {
            if ($arrayReq[$l] !== "" and $arrayReq[$l] !== null and !empty($arrayReq) and $arrayReq[$l] !== " ") {
                $arrayRegDef[$g] = $arrayReq[$l];
                $g++;
            }
        }
        $props = null;
        for ($n = 0; $n < count($arrayRegDef); $n++) {
            if (($n % 2) == 0) {
                $props = $class->getProperty($arrayRegDef[$n]);

            } else {
                $props->setValue($arrayRegDef[$n]);
            }
        }
        $response = new Response(
            var_dump($class->newInstanceWithoutConstructor()),
            Response::HTTP_OK,
            array('content-type' => 'text/json'));
        return $response;




    }




}