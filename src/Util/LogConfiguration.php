<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 06/07/2018
 * Time: 16:29
 */

namespace App\Util;


use Psr\Log\LoggerInterface;
use Symfony\Bridge\Monolog\Logger;

class LogConfiguration
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * LogConfiguration constructor.
     */
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }



}