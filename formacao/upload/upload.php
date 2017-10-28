<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 28/10/17
 * Time: 11:16
 */

session_start();

$folder = __DIR__ . "/uploads/";
$upload = $_FILES['imagem'];
$type = ['image/png', 'image/jpg', 'image/jpeg'];

if (!in_array($upload['type'], $type)) {
    $_SESSION['Erro'] = "Formato não aceito!";
} else {
    $_SESSION = [];
    if (!is_dir($folder)) {
        mkdir($folder);
    }

    $ext = strrchr($upload['name'], '.');
    $newName = md5($upload['name']) . time() . $ext;

    move_uploaded_file($upload['tmp_name'], $folder . $newName);
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
