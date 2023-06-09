<?php

require_once './config.ini';
require_once './function/func.php';

if (!empty($_COOKIE['authorization'])) {
    echo "
        <div class='alert alert-success' role='alert'>
          <a href='./explorer.php'>Перейти в панель вдминистрирования</a>
          <a href='logout.php'>Выйти из админки</a>
        </div>
        
    ";
}

if (!empty($_POST['enter'])) {
    if (true !== ($resultCheckAuth = checkAuth($_POST['login'], $_POST['password'])) ) {
        echo "
        <div class='alert alert-danger' role='alert'>
           ${resultCheckAuth}
        </div>
    ";
    } else {
        $_SESSION['login'] = $_POST['login'];
        setcookie('authorization', $_POST['login'], time()+1800);
        echo "
        <div class='alert alert-success' role='alert'>
           Вы успешно авторизировались под ником ${_POST['login']} верно!
           <a href='./explorer.php'>Перейти в панель вдминистрирования</a>
        </div>
        
    ";
    }
}


require_once './header.php';
?>



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
        </div>
    </div>
</div>

</body>
</html>
