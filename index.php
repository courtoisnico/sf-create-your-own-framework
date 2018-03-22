<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 21/03/18
 * Time: 15:00
 */
$name = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');

printf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8'));