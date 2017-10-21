<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 10:35
 */
session_start();
require __DIR__ . '/../../Files/form/conn.php';

$secret = "XahsjsAAA374745SSDD";
$data = $_POST;

checkRegister($data, $conn);
insert($user, $data, $conn);

/**
 * @param $data
 * @param $conn
 * @see Função para checar se já existe o nome ou e-mail.
 */
function checkRegister ($data, $conn) {
    $sql = "SELECT * FROM users WHERE name = :name";
    $select = $conn->prepare($sql);
    $select->bindValue(':name', $data['name']);

    if (!$select->execute()) {
        setcookie("acesso_banco", "Erro ao processar", strtotime("+1 day"));
        header('Location: /session_cookies/login/index.php');
        die();
    }

    if ($select->rowCount()) {
        setcookie("register_name", "Name already exists", strtotime("+1 day"));
        header('Location: /session_cookies/register/index.php');
        die();
    }

    $sql = "SELECT * FROM users WHERE email = :email";
    $select = $conn->prepare($sql);
    $select->bindValue(':email', $data['email']);

    if ($select->rowCount()) {
        setcookie("register_email", "E-mail already exists", strtotime("+1 day"));
        header('Location: /session_cookies/register/index.php');
        die();
    }

    require __DIR__ . '/../../clear_cookies.php';
}

function insert($data, $conn) {
    $sqlinsert = "INSERT INTO users(name, email, password created_at, updated_at) VALUES ( :name, :email, :password, now(), now() )";
    $secret = "XahsjsAAA374745SSDD";

    $insert = $conn->prepare($sqlinsert);
    $insert->bindValue(':name', ucwords($data['name']));
    $insert->bindValue(':email', $data['email']);
    $insert->bindValue(':password', sha1($data['password'], $secret));

    if (!$insert->execute()) {
        setcookie("acesso_banco", "Erro ao processar", strtotime("+1 day"));
        header('Location: /session_cookies/login/index.php');
        die();
    }

    unset($data['password']);
    $_SESSION['user'] = $data;
    header('Location: /session_cookies/admin.php');
}

require_once __DIR__ . '/../../clear_cookies.php';