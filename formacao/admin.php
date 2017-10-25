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

    <link rel="stylesheet" type="text/css" href="/Layout/css/menu.css";
</head>

<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='#'>Home</a></li>
            <li class='active'><a href='https://s.codepen.io/dmitrykiselyov/debug/XJwqZM?SecondTap'>Products</a>
                <ul>
                    <li><a href='#Product 1'>Product 1</a>
                        <ul>
                            <li><a href='#SubProduct1'>Sub Product</a></li>
                            <li><a href='#SubProduct2'>Sub Product</a></li>
                        </ul>
                    </li>
                    <li><a href='#Product 2'>Product 2</a>
                        <ul>
                            <li><a href='#'>Sub Product</a></li>
                            <li><a href='#'>Sub Product</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href='#'>About</a></li>
            <li><a href='#'>Contact</a></li>
            <li class='active' style="float: right; padding-right: 4.7em;">
                <a href='https://s.codepen.io/dmitrykiselyov/debug/XJwqZM?SecondTap'>
                    <?=ucwords(($user['name'] != null) ? $user['name'] : $user['NAME'])?>
                </a>
                <ul>
                    <li><a href='#Profile'>Profile
                            <svg class="icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#users"></use>
                            </svg>
                        </a></li>
                    <li><a href="/formacao/login/logout.php">Logout
                            <svg class="icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#exit"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/Layout/javascript/menu.js"></script>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="exit" viewBox="0 0 32 32">
            <title>exit</title>
            <path d="M24 20v-4h-10v-4h10v-4l6 6zM22 18v8h-10v6l-12-6v-26h22v10h-2v-8h-16l8 4v18h8v-6z"></path>
        </symbol>
        <symbol id="users" viewBox="0 0 36 32">
            <title>users</title>
            <path d="M24 24.082v-1.649c2.203-1.241 4-4.337 4-7.432 0-4.971 0-9-6-9s-6 4.029-6 9c0 3.096 1.797 6.191 4 7.432v1.649c-6.784 0.555-12 3.888-12 7.918h28c0-4.030-5.216-7.364-12-7.918z"></path>
            <path d="M10.225 24.854c1.728-1.13 3.877-1.989 6.243-2.513-0.47-0.556-0.897-1.176-1.265-1.844-0.95-1.726-1.453-3.627-1.453-5.497 0-2.689 0-5.228 0.956-7.305 0.928-2.016 2.598-3.265 4.976-3.734-0.529-2.39-1.936-3.961-5.682-3.961-6 0-6 4.029-6 9 0 3.096 1.797 6.191 4 7.432v1.649c-6.784 0.555-12 3.888-12 7.918h8.719c0.454-0.403 0.956-0.787 1.506-1.146z"></path>
        </symbol>
    </svg>
</body>
</html>