<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 30/10/17
 * Time: 11:32
 */

require __DIR__ . '/../../Layout/header.php';
$user = $_SESSION['user'];

?>

<div class="container-text">
    <form class="form-horizontal" action="/profile.php" method="POST" enctype="multipart/form-data">
        <h1>
            Avatar
        </h1>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="input-group" style="width: 40em;">
                    <div class="input-group-addon fix">File</div>
                    <input type="file" class="form-control" name="file">
                </div>
            </div>
        </div>
    </form>

    <form class="form-horizontal" action="profile.php" method="POST">
        <hr>
        <h1>
            Profile
        </h1>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="input-group" style="width: 40em;">
                    <div class="input-group-addon fix">Name</div>
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
                    <div class="input-group-addon fix">Old Password</div>
                    <input id="name" type="password" class="form-control" name="name" placeholder="********">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="input-group" style="width: 40em;">
                    <div class="input-group-addon fix">New Password</div>
                    <input id="name" type="password" class="form-control" name="name" placeholder="********">
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Confirm</button>
            <button type="button" class="btn btn-danger" onclick="history.back()">Cancel</button>
        </div>
    </form>
</div>