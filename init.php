<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 */

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$response = new Response();