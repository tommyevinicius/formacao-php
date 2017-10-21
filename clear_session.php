<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 14:37
 */

session_start();

session_destroy();
$_SESSION = [];