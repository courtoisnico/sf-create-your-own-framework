<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
//$response = new Response();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

/*$map = array(
    '/hello' => __DIR__.'/../src/pages/hello.php',
    '/bye' => __DIR__.'/../src/pages/bye.php',
);

$path = $request->getPathInfo();*/

try {
    extract($request->query->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    $response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occured', 500);
}

/*if (isset($map[$path])) {
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
//    include $map[$path];
    include sprintf(__DIR__.'/../src/pages/%s.php', $map[$path]);
    //$response->setContent(ob_get_clean());
    $response = new Response(ob_get_clean());
} else {
    //$response->setStatusCode(404);
    //$response->setContent('Not Found');
    $response = new Response('Not Found', 404);
}*/

$response->send();