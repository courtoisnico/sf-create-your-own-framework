<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 21/03/18
 * Time: 15:00
 */

require_once __DIR__.'/init.php';

$name = $request->get('name', 'World');

//$response = new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
$response->send();