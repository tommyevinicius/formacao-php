<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 10:01
 */
session_start();

require __DIR__ . '/../../Files/form/conn.php';

$lifetime = strtotime("+1 day");
$secret = "XahsjsAAA374745SSDD";

// PREPARANDO SQL, VERIFICAÇÃO DE LOGIN
$sql = "SELECT * FROM users WHERE email = :email";
$select = $conn->prepare($sql);
$select->bindValue(':email', $_POST['email']);

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

$user = $select->fetch(PDO::FETCH_ASSOC);

if ($user['PASSWORD'] != sha1($_POST['password'] . $secret)) {
    setcookie("acesso_login", "Wrong username or password", $lifetime);
    header('Location: /session_cookies/login/index.php');
    die();
}

unset($user['password']);
$_SESSION['user'] = $user;
header('Location: /session_cookies/admin.php');

require_once __DIR__ . '/../../clear_cookies.php';