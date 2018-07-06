<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 28/06/2018
 * Time: 10:39
 */

namespace App\Util;


class SendEmail
{
    private $mailer;
    private $twig;
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }
    public function sendEmail($paramiter, $emailto){
        $message = (new \Swift_Message('Conferma registrazione'))
            ->setFrom('ruben.cozzolino@gmail.com')
            ->setTo($emailto)
            ->setBody(
                $this->twig->render(
                    'email.html.twig',
                    array('code' => $paramiter)
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);

    }
}