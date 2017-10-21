<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 21/10/17
 * Time: 11:05
 */

session_start();

if (!isset($_SESSION['user'])){
    die('Faça login para acessar a página');
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    -->

    <link rel="stylesheet" type="text/css" href="/Layout/css/admin.css";
    <link href='https://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
-->
    <div class="container">
        <header>
            <h2>Formação PHP 5</h2>
        </header>

        <nav class="menu">
 //add active class on menu
    $('ul li').click(function(e) {
        e.preventDefault();
        $('li').removeClass('active');
        $(this).addClass('active');
    });            <ul>
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li class="drop-down">
                    <a href="#">Products</a>

                    <div class="mega-menu fadeIn animated">
                        <div class="mm-6column">
                            <span class="left-images">
                                <img  src="https://api.codeexpertslearning.com.br/assets/img/courses/formacao-php-basico.jpg">
                                <p>Most Popular</p>
                            </span>
                        </div>
                    </div>
                </li>

                <li style="float: right;">
                    <a href="/session_cookies/login/logout.php">Logout</a>
                </li>
                <li style="float: right;">
                    Bem vindo, <?=$user['NAME']?>&nbsp
                </li>
        </nav>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/Layout/javascript/teste.js"></script>
</body>
</html>