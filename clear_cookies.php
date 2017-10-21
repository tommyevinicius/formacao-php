<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 14:38
 */

if (isset($_COOKIE['acesso_banco'])) {
    setcookie('acesso_banco', '', time()-1000);
}

if (isset($_COOKIE['acesso_login'])) {
    setcookie('acesso_login', '', time()-1000);
}

if (isset($_COOKIE['register_name'])) {
    setcookie('register_name', '', time()-1000);
}

if (isset($_COOKIE['register_email'])) {
    setcookie('register_email', '', time()-1000);
}
