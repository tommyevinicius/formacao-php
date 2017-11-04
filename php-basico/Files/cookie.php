<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 12:05
 */


$lifetime = strtotime("+1 day");

setcookie("teste", "Valores ok", $lifetime);

print 'F12 > Application > Cookies > Sua aplicação';

var_dump($_COOKIE);