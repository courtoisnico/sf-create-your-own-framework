<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 */
require_once __DIR__.'init.php';

$response->setContent('Goodbye!');
$response->send();