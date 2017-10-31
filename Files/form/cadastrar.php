<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 10:35
 */

require __DIR__ . '/conn.php';

$sqlselect = "SELECT * FROM users WHERE email = :email";

$select = $conn->prepare($sql);
$select->bindValue(':email', $_POST['email']);

if (!$select->execute()) {
    die('Erro ao processar');
}

if (!$select->rowCount()) {
    die('Login / Senha inválido');
}

$sqlinsert = "INSERT INTO users(name, email, password created_at, updated_at) VALUES ( :name, :email, :password, now(), now() )";
$secret = "XahsjsAAA374745SSDD";

$insert = $conn->prepare($sqlinsert);
$insert->bindValue(':name', $_POST['name']);
$insert->bindValue(':email', $_POST['email']);
$insert->bindValue(':password', sha1($_POST['password'], $secret));

# Execute, irá executar o que está definido dentro da variável.
if ($insert->execute()) {
    $perfil = $_POST['name'];
    print "<h1 style='color: green;'>Registro cadastrado com sucesso <span style='text-align: center; text-shadow: 1px 1px #737373;'>$perfil</span>!</h1><hr>";
} else {
    print "<h1 style='text-align: center; color: green;'>Registro não cadastrado!</h1><hr>";
}