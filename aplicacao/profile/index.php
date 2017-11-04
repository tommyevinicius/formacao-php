<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 30/10/17
 * Time: 11:32
 */

require __DIR__ . '/../../Layout/header.php';

?>

<div class="container-text">
    <?php
        if (isset($_SESSION['Erro']) || isset($_SESSION['Success'])) {
            if (isset($_SESSION['Erro']) || !empty($_SESSION['Erro'])) {
                $tipo = 'alert-danger';
                $mensagem = $_SESSION['Erro'];
            } else {
                $tipo = 'alert-success';
                $mensagem = $_SESSION['Success'];
            }
            echo '<p class="' . $tipo . ' text-center">' . $mensagem . '</p>';
        }
    ?>
    <form class="form-inline" action="/aplicacao/upload/upload.php" method="POST" enctype="multipart/form-data">
        <h1>
            Avatar
        </h1>
        <div class="form-group">
            <div class="input-group" style="width: 40em;">
                <div class="input-group-addon">File</div>
                <input type="file" class="form-control" name="file">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <form class="form-horizontal" action="profile.php" method="POST">
        <hr>
        <h1>
            Profile
        </h1>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="input-group" style="width: 40em;">
                    <div class="input-group-addon">Name</div>
                    <input id="name" type="text" class="form-control" name="name" placeholder="<?=$user['NAME'];?>">
                </div>
            </div>
        </div>
        <hr>
        <h1>
            Password
        </h1>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="input-group" style="width: 40em;">
                    <div class="input-group-addon">Old Password</div>
                    <input id="name" type="password" class="form-control" name="oldpassword" placeholder="********">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="input-group" style="width: 40em;">
                    <div class="input-group-addon">New Password</div>
                    <input id="name" type="password" class="form-control" name="password" placeholder="********">
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Confirm</button>
            <button type="button" class="btn btn-danger" onclick="location.href = '/Layout/home.php';">Cancel</button>
        </div>
    </form>
</div>