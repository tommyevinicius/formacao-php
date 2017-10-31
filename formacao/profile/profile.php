<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 30/10/17
 * Time: 11:38
 */

session_start();
require __DIR__ . '/../../Files/form/conn.php';

if (!isset($_POST) || (empty($_POST['name']) && empty($_POST['oldpassword']) && empty($_POST['password']))) {
    $_SESSION['Erro'] = 'Fill the fields';
    header('Location: /formacao/profile/index.php');
    exit();
}

$user = $_SESSION['user'];
$sql = 'SELECT * FROM users WHERE ID_USERS = :iduser';
$select = $conn->prepare($sql);
$select->bindValue(':iduser', $user['ID_USERS']);

if (!$select->execute()) {
    $_SESSION['Erro'] = 'Error to proccess';
    header('Location: /formacao/profile/index.php');
    exit();
}

$user = $select->fetch(PDO::FETCH_ASSOC);
$secret = "XahsjsAAA374745SSDD";
$senha = sha1($_POST['oldpassword'] . $secret);

if (!checkPassword($_POST)) {
    if (sha1($_POST['oldpassword'] . $secret) != $user['PASSWORD']) {
        $_SESSION['Erro'] = 'Wrong Password';
        header('Location: /formacao/profile/index.php');
        exit();
    }
}

$_SESSION['Erro'] = null;

$sql = "UPDATE users SET ";
$sql = sqlValueProfile($_POST, $sql);
$update = $conn->prepare($sql);
$update = bindValueProfile($_POST, $update, $secret);

$update->execute();

$_SESSION['Success'] = "Successfully registered";
header('Location: /formacao/profile/index.php');
exit();
/**
 * @param $data
 * @param $update
 * @return mixed
 */
function bindValueProfile($data, $update, $secret) {
    $profile = [];
    if (!empty($data['name']) || !empty($data['NAME'])) {
        $profile['name'] = empty($data['name']) ? $data['NAME'] : $data['name'];
        $update->bindValue(':name', $profile['name']);
    }
    if (!empty($data['password']) || !empty($data['PASSWORD'])) {
        $profile['password'] = empty($data['password']) ? $data['PASSWORD'] : $data['password'];
        $update->bindValue(':password', sha1($profile['password'] . $secret));
    }

    $update->bindValue(':iduser', $_SESSION['user']['ID_USERS']);
    return $update;
}

function sqlValueProfile ($data, $sql) {
    $size = strlen($sql);

    if (!empty($data['name']) || !empty($data['NAME'])) {
        $sql .= 'NAME = :name';
    }
    if (!empty($data['password']) || !empty($data['PASSWORD'])) {
        if ($size != strlen($sql)) {
            $sql .= ', PASSWORD = :password';
        } else {
            $sql .= 'PASSWORD = :password';
        }
    }

    $sql .= ' WHERE ID_USERS = :iduser;';

    return $sql;
}

function checkPassword($data) {
    if (empty($data['oldpassword'])) {
        if (empty($data['password'])) {
            return true;
        }
    }
    if (empty($data['password'])) {
        if (empty($data['oldpassword'])) {
            return true;
        }
    }

    return false;
}