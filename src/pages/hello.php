<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 06/04/2018
 * Time: 11:34
 */

//require_once __DIR__.'/init.php';

$name = $request->get('name', 'World');
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));