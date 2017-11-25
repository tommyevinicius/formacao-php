<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 10:01
 */

session_start();

require __DIR__ . '/../../Files/form/conn.php';

if (isset($_POST) && $_POST != null) {
    $user = checkLogin($_POST, $conn);
    login($user, $_POST);
}

function checkLogin ($data, $conn) {

    $sql = "SELECT * FROM users WHERE email = :email";
    $select = $conn->prepare($sql);
    $select->bindValue(':email', $data['email']);

    if (!$select->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/login/index.php');
        exit();
    }

    if (!$select->rowCount()) {
        $_SESSION['Erro'] = 'Wrong username or password';
        header('Location: /aplicacao/login/index.php');
        exit();
    }

    return $select->fetch(PDO::FETCH_ASSOC);
}

function login ($user, $data) {
    $secret = "XahsjsAAA374745SSDD";

    $senha = sha1($data['password'] . $secret);

    if ($user['PASSWORD'] != sha1($data['password'] . $secret)) {
        $_SESSION['Erro'] = 'Wrong username or password';
        header('Location: /aplicacao/login/index.php');
        exit();
    }

    unset($user['PASSWORD']);
    $_SESSION['user'] = $user;
    header('Location: /layout/home.php');
    exit();
}

header('Location: /aplicacao/login/index.php');
$_SESSION = [];