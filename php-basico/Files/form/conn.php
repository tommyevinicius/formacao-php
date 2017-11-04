<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 11:34
 */

$dsn = 'mysql:dbname=formacao;host=localhost';
$userdb = 'root';
$passworddb = 'root';

try {
    $conn = new PDO ($dsn, $userdb, $passworddb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    throw new PDOException($e);
}

