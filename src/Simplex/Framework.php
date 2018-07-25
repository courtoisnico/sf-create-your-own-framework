<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 12/04/2018
 * Time: 17:11
 */
namespace Simplex;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;


class Framework extends HttpKernel\HttpKernel
{
    public function __construct($routes)
    {
        $requestStack = new RequestStack();
    }

}