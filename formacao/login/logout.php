<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 11:22
 */

session_start();

session_destroy();

$_SESSION = [];

header('Location: /formacao/login/');