<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 03/12/17
 * Time: 11:34
 */
require 'vendor/autoload.php';

use Code\Sum;

$result = new Sum();

print $result->sum(1,2);

/* TERMINAL

cd php-tests
bin/phpunit

*/