<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 25/11/17
 * Time: 10:50
 */

require __DIR__ . '/../bootstrap.php';

$url = explode('/', substr($_SERVER['REQUEST_URI'], 1));

$controller = !isset($url[0]) || !$url[0] ? 'home' : $url[0];

if (!class_exists($controller = 'Code\Controller\\' . ucfirst($controller) . 'Controller'))
{
    die('Controller não encontrado');
}

$actions = !isset($url[1]) || !$url[1] ? 'index' : $url[1];
$params = !isset($url[2]) || !$url[2] ? '' : $url[2];

print call_user_func_array([new $controller, $actions], [$params]);
