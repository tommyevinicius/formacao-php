<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 28/10/17
 * Time: 11:16
 */

session_start();
require __DIR__ . '/../../Files/form/conn.php';

$folder = __DIR__ . "/uploads/";
$upload = $_FILES['file'];
$type = ['image/png', 'image/jpg', 'image/jpeg'];

if (!in_array($upload['type'], $type)) {
    $_SESSION['Erro'] = "Extension not allowed";
    header('Location: /aplicacao/profile/index.php');
    exit();
} else {
    if (!is_dir($folder)) {
        mkdir($folder);
    }

    $ext = strrchr($upload['name'], '.');
    $newName = md5($upload['name']) . time() . $ext;

    $id = $_SESSION['user'];
    $img_old = $id['AVATAR'];
    $sql = 'UPDATE users SET AVATAR = :newName WHERE ID_USERS = :idusers';
    $update = $conn->prepare($sql);
    $update->bindValue(':newName', $newName);
    $update->bindValue(':idusers', $id['ID_USERS']);
    $sql = $update->queryString;

    if (!$update->execute()) {
        $_SESSION['Erro'] = 'Error to proccess';
        header('Location: /aplicacao/profile/index.php');
        exit();
    }

    unlink(__DIR__ . '/uploads/' .$img_old);

    move_uploaded_file($upload['tmp_name'], $folder . $newName);
    $_SESSION['Erro'] = null;
    $_SESSION['Success'] = "File Uploaded";
    header('Location: /aplicacao/profile/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de Imagens</title>
</head>
<body>
<form action="#">
    <fieldset>
        <legend><h1>Upload de Imagens</h1></legend>
        <table>
            <tr>
                <?php if (isset($_SESSION['Erro'])) : ?>
                    <td><?=$_SESSION['Erro'];?></td>
                <?php else : ?>
                <td>Arquivo enviado com sucesso!</td>
                <?php endif; ?>
            </tr>
        </table>
    </fieldset>
</form>
</body>
</html>
