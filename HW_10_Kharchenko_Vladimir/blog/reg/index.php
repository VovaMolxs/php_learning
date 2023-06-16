<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/connection.php';

//если авторизирован пользователь, то перенаправляем пользователся на главную
if (isset($_SESSION['login'])) {
    header('Location: /');
}


if (!empty($_POST['enter'])) {

    $_POST['login'] = trim($_POST['login']);
    $_POST['password'] = trim($_POST['password']);

    if (true !== ($checkAuth = checkAuth($_POST['login'], $_POST['password'], $mysqli))) {
        echo $checkAuth;
    } else {
        echo "Вы успешно авторизировались! Через 3 секунды вы будете отправлены на главную страницу!";
        header('Refresh: 3; url=/');
    }
}


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="content">
    <div class="row justify-content-md-center">
        <div class="col-4">
            <form action="" method="post">
                <div class="mb-2">
                    <label for="login">Введите ваш логин: </label>
                    <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="mb-2">
                    <label for="password">Введите ваш пароль: </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-2">
                    <input type="submit" class="form-control btn btn-primary" name="enter" value="войти">
                </div>
            </form>

            <a href="reg.php">Зарегистрировать аккаунт</a>
        </div>
    </div>
</div>

</body>
</html>