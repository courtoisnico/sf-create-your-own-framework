<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 21/03/18
 * Time: 15:00
 */

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

//$name = isset($_GET['name']) ? $_GET['name'] : 'World';
$name = $request->get('name', 'World');

//header('Content-Type: text/html; charset=utf-8');
//printf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8'));
$response = new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));

$response->send();