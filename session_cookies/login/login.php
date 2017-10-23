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
    $lifetime = strtotime("+1 day");

// PREPARANDO SQL, VERIFICAÇÃO DE LOGIN
    $sql = "SELECT * FROM users WHERE email = :email";
    $select = $conn->prepare($sql);
    $select->bindValue(':email', $data['email']);

    if (!$select->execute()) {
        setcookie("acesso_banco", "Erro ao processar", $lifetime);
        header('Location: /session_cookies/login/index.php');
        die();
    }

    if (!$select->rowCount()) {
        setcookie("acesso_login", "Wrong username or password", $lifetime);
        header('Location: /session_cookies/login/index.php');
        die();
    }

    return $select->fetch(PDO::FETCH_ASSOC);
}

function login ($user, $data) {
    $lifetime = strtotime("+1 day");
    $secret = "XahsjsAAA374745SSDD";

    $senha = sha1($data['password'] . $secret);

    if ($user['PASSWORD'] != sha1($data['password'] . $secret)) {
        setcookie("acesso_login", "Wrong username or password", $lifetime);
        header('Location: /session_cookies/login/index.php');
        die();
    }

    unset($user['PASSWORD']);
    $_SESSION['user'] = $user;
    header('Location: /session_cookies/admin.php');
    exit();
}

require_once __DIR__ . '/../../clear_cookies.php';
header('Location: /session_cookies/login/index.php');