<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 25/07/2018
 * Time: 17:10
 */
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Symfony\Component\EventDispatcher;
use Simplex\Framework;
use Simplex\StringResponseListener;

$containerBuilder = new DependencyInjection\ContainerBuilder();
$containerBuilder->register('context', Routing\RequestContext::class);
$containerBuilder->register('matcher', \Symfony\Component\Routing\Matcher\UrlMatcher::class)
    ->setArguments(array('%routes%', new Reference('context')))
;
$containerBuilder->register('request_stack', HttpFoundation\RequestStack::class);
$containerBuilder->register('controller_resolver', HttpKernel\Controller\ControllerResolver::class);
$containerBuilder->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);

$containerBuilder->register('listener.route', HttpKernel\EventListener\RouterListener::class)
    ->setArguments(array(new Reference('matcher'), new Reference('request_stack')))
;
$containerBuilder->register('listener.response', HttpKernel\EventListener\ExceptionListener::class)
    ->setArguments(array('Calendar\Controller\ErrorController:exceptionAction'))
;
$containerBuilder->register('listener.string_response', \Symfony\Component\HttpKernel\EventListener\RouterListener::class)
    ->setArguments(array('%charset%'));

$containerBuilder->register('listener.string_response', StringResponseListener::class);

$containerBuilder->register('listener.exception', HttpKernel\EventListener\ExceptionListener::class)
    ->setArguments(array('Calendar\Controller\ErrorController::exceptionAction'))
;

$containerBuilder->register('dispatcher', EventDispatcher\EventDispatcher::class)
    ->addMethodCall('addSubscriber', array(new Reference('listener.route')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.response')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.exception')))
;
$containerBuilder->getDefinition('dispatcher')->addMethodCall('addSubscriber', array(new \Symfony\Component\DependencyInjection\Reference('listener.string_response')));

$containerBuilder->register('framework', Framework::class)
    ->setArguments(array(
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ))
;

return $containerBuilder;