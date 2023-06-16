<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/connection.php';

//если авторизирован пользователь, то перенаправляем пользователся на главную
if (isset($_SESSION['login'])) {
    header('Location: /');
}


if (!empty($_POST['reg'])) {

    $_POST['login'] = trim($_POST['login']);
    $_POST['first_name'] = trim($_POST['first_name']);
    $_POST['last_name'] = trim($_POST['last_name']);
    $_POST['password'] = trim($_POST['password']);

    //проверяем заполненные поля формы
    if (true !== ($resultCheckForm = checkForm($_POST['login'], $_POST['first_name'], $_POST['last_name'], $_POST['password']))) {
        echo $resultCheckForm;
    }

    //добавляем пользователя в базу данных
    if (true !== ($resultSetNewUser = setNewUser($_POST['login'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $mysqli))) {
        echo $resultSetNewUser;
    } else {
        echo "Вы успешно зарегистрировались! Ваш логин " . $_POST['login'] . " ваше имя " . $_POST['first_name'];
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
                    <label for="first_name">Введите ваше Имя: </label>
                    <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="mb-2">
                    <label for="login">Введите вашу Фамилию: </label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <div class="mb-2">
                    <label for="password">Введите ваш пароль: </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-2">
                    <input type="submit" class="form-control btn btn-primary" name="reg" value="Зарегистрироваться">
                </div>
            </form>

            <a href="index.php">Зарегистрировать аккаунт</a>
        </div>
    </div>
</div>

</body>
</html>