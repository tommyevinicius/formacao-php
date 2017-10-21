<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 11:34
 */

$dsn = 'mysql:dbname=formacao;host=localhost';
$user = 'root';
$password = 'root';

/**
 * Abstrai conexão com o banco de dados.
 * Pode conectar com vários bancos com o PHP.
 */
$conn = new PDO($dsn, $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
