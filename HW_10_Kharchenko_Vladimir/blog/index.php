<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: burlywood;
        }

        .promo-block {
            width: 80%;
            margin: auto;
            text-align: center;
            margin-top: 200px;
        }
    </style>
</head>
<body>

<section class="promo-block">
    <header class="promo">
        <h2>Добро пожаловать в БЛОГ!</h2>
        <a href="/articles/" class="cta ga-hero-cta">Войти в БЛОГ!</a>

        <p>Чтобы создать свой собственный блог, потребуется зарегистрироваться или войти в имеющийся аккаунт!</p>
        <?php
            if (!empty($_SESSION['login'])) {
                echo "
                <a href='/reg/logout.php?do=exit'>Выйти из акааунта</a>
                ";
            } else {
                echo "
                <a href='/reg'>Войти в свой акаунт</a>
                <a href='/reg/reg.php'>Зарегистрироваться</a>
                ";
            }

        ?>

    </header>

</section>


</body>
</html>