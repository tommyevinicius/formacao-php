<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/Layout/css/login.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>

<body class="align">
<div class="grid">
<!--    <h1 class="text--center">Formação PHP 5</h1>-->
    <img src="/Layout/formacao.png" title="formacao" name="formacao" height="100" width="320" style="padding: 1em;"/>
    <form action="/formacao/login/login.php" method="POST" class="form login">

        <div class="form__field">
            <label for="email">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                </svg>
                <span class="hidden">Username</span></label>
            <input id="email" type="text" name="email" class="form__input" placeholder="E-mail" required>
        </div>

        <div class="form__field">
            <label for="password">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
                </svg>
                <span class="hidden">Password</span></label>
            <input id="password" type="password" name="password" class="form__input" placeholder="Password"
                   required>
        </div>

        <p class="text--center text--warning">
            <?=(!isset($_SESSION['Erro'])) ? '' : $_SESSION['Erro']; ?>
        </p>

        <div class="form__field">
            <input type="submit" value="Sign In">
        </div>

    </form>
    <div class="text--center">
        <p class="text--center" style="float: left"><a href="/formacao/register/index.php" onclick="session_destroy()">Sign up now</a>
            <svg class="icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#enter"></use>
            </svg>
        </p>
        <p class="text--center" style="float: right"><a href="#" onclick="session_destroy(), window.location.reload()">Reset Password&nbsp;</a>
            <svg class="icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#key"></use>
            </svg>
        </p>
    </div>

</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="enter" viewBox="0 0 32 32">
        <path d="M12 16h-10v-4h10v-4l6 6-6 6zM32 0v26l-12 6v-6h-12v-8h2v6h10v-18l8-4h-18v8h-2v-10z"></path>
    </symbol>
    <symbol id="lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/>
    </symbol>
    <symbol id="user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/>
    </symbol>
    <symbol id="key" viewBox="0 0 32 32">
        <path d="M22 0c-5.523 0-10 4.477-10 10 0 0.626 0.058 1.238 0.168 1.832l-12.168 12.168v6c0 1.105 0.895 2 2 2h2v-2h4v-4h4v-4h4l2.595-2.595c1.063 0.385 2.209 0.595 3.405 0.595 5.523 0 10-4.477 10-10s-4.477-10-10-10zM24.996 10.004c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"></path>
    </symbol>
</svg>

<script>
    function session_destroy(){
        <?php
            session_destroy();
        ?>
    }
</script>

</body>
</html>
