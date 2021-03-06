<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 19/07/2018
 * Time: 14:30
 */

namespace Simplex;


use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseEvent extends Event
{
    private $request;
    private $response;

    public function __construct( Response $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }
}