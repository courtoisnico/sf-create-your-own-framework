<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 25/07/2018
 * Time: 15:28
 */

namespace Calendar\Controller;


use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;

class ErrorController
{
    public function exceptionAction(FlattenException $exception)
    {
        $msg = 'Something went wrong! ('.$exception->getMessage().')';

        return new Response($msg, $exception->getStatusCode());
    }

}