<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 10:35
 */
session_start();
require __DIR__ . '/../../Files/form/conn.php';

checkRegister($_POST, $conn);
insert($_POST, $conn);

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
        header('Location: /formacao/login/index.php');
        $_SESSION['Erro'] = 'Error to proccess';
        die();
    }

    if ($select->rowCount()) {
        $_SESSION['Erro'] = 'Name already exists';
        header('Location: /formacao/register/index.php');
        die();
    }

    $sql = "SELECT * FROM users WHERE email like :email";
    $select = $conn->prepare($sql);
    $select->bindValue(':email', $data['email']);
    $select->execute();

    if ($select->rowCount()) {
        $_SESSION['Erro'] = 'E-mail already exists';
        header('Location: /formacao/register/index.php');
        die();
    }

    $_SESSION = [];
}

/**
 * @param $data
 * @param $conn
 * @see Inserir o dado novo.
 */
function insert($data, $conn) {
    $sql = "INSERT INTO users (name, email, password, created_at, updated_at) VALUES ( :name, :email, :password, now(), now() )";
    $secret = "XahsjsAAA374745SSDD";
    $senha = sha1($data['password'] . $secret);

    $insert = $conn->prepare($sql);
    $insert->bindValue(':name', ucwords($data['name']));
    $insert->bindValue(':email', $data['email']);
    $insert->bindValue(':password', sha1($data['password'] . $secret));

    if (!$insert->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /Layout/home.php');
        die();
    }

    unset($data['password']);
    $_SESSION['user'] = $data;
    header('Location: /Layout/home.php');
    exit();
}

$_SESSION = [];