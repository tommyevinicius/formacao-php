<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 25/11/17
 * Time: 10:21
 */

define('DS', DIRECTORY_SEPARATOR);

require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$app = new App();

print $app->run();