<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Simplex\StringResponseListener;

//$routes = include __DIR__.'/../src/app.php';
$container = include __DIR__.'/../src/container.php';

$container->setParameter('debug', true);

echo $container->getParameter('debug');

$container->setParameter('charset', 'UTF-8');

$container->setParameter('routes', include __DIR__.'/../src/app.php');

$request = Request::createFromGlobals();

$response = $container->get('framework')->handle($request);

$response->send();