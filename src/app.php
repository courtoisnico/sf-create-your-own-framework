<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 09/04/2018
 * Time: 16:38
 */
use Symfony\Component\Routing;
//use Symfony\Component\HttpFoundation\Response;
//use Calendar\Controller\LeapYearController;


$routes = new Routing\RouteCollection();
//$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        $request->headers->set('foo', 'bar');

        $response = render_template($request);

        $response->headers->set('Content-Type', 'text/plain');

        return $response;
    }
    )));
$routes->add('bye', new Routing\Route('/bye'));
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::indexAction',
)));

//$dumper = new Routing\Matcher\Dumper\PhpMatcherDumper($routes);
//echo $dumper->dump();

return $routes;