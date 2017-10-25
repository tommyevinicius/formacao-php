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
    <h1 class="text--center">Register</h1>
    <form action="/formacao/register/cadastrar.php" method="POST" class="form login">

        <div class="form__field">
            <label for="name">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bubble"></use>
                </svg>
                <span class="hidden">Name</span></label>
            <input id="name" type="text" name="name" class="form__input" placeholder="Name" required>
        </div>

        <div class="form__field">
            <label for="email">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                </svg>
                <span class="hidden">Username</span></label>
            <input id="email" type="email" name="email" class="form__input" placeholder="E-mail" required>
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
            <?=$_SESSION['Erro'];?>
        </p>

        <div class="form__field">
            <input style="background-color: #58d484;" type="submit" value="Register">
        </div>

    </form>

    <p class="text--center"><a href="/formacao/login/login.php" onclick="session_destroy()">Cancel</a>
        <svg class="icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-undo"></use>
        </svg>
    </p>

</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/>
    </symbol>
    <symbol id="lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/>
    </symbol>
    <symbol id="user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/>
    </symbol>
    <symbol id="icon-bubble" viewBox="0 0 32 32">
        <title>bubble</title>
        <path d="M16 2c8.837 0 16 5.82 16 13s-7.163 13-16 13c-0.849 0-1.682-0.054-2.495-0.158-3.437 3.437-7.539 4.053-11.505 4.144v-0.841c2.142-1.049 4-2.961 4-5.145 0-0.305-0.024-0.604-0.068-0.897-3.619-2.383-5.932-6.024-5.932-10.103 0-7.18 7.163-13 16-13z"></path>
    </symbol>
    <symbol id="icon-undo" viewBox="0 0 32 32">
        <title>undo</title>
        <path d="M16 2c-4.418 0-8.418 1.791-11.313 4.687l-4.686-4.687v12h12l-4.485-4.485c2.172-2.172 5.172-3.515 8.485-3.515 6.627 0 12 5.373 12 12 0 3.584-1.572 6.801-4.063 9l2.646 3c3.322-2.932 5.417-7.221 5.417-12 0-8.837-7.163-16-16-16z"></path>
    </symbol>
    <symbol id="icon-floppy-disk" viewBox="0 0 32 32">
        <title>floppy-disk</title>
        <path d="M28 0h-28v32h32v-28l-4-4zM16 4h4v8h-4v-8zM28 28h-24v-24h2v10h18v-10h2.343l1.657 1.657v22.343z"></path>
    </symbol>
</svg>

<script>
    function session_destroy(){
        <?php
            session_start();
            session_destroy();
            $_SESSION = [];
        ?>
    }
</script>

</body>
</html>
