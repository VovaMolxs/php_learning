<?php
function checkForm() {
    $checker = false;
    $message = "Ok";
    if (!isset($_POST['send'])) {
        return false;
    }

    if (empty($_POST['userName']) || empty($_POST['email']) || empty($_POST['numberPhone']) || empty($_POST['message'])) {
        $message = "Заполните все поля перед отправкой формы!";
        return false;
    }

    $patternCheckNumber = '/\+[0-9]{3}\s[0-9]{2}\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/';
    $patternCheckEmail = '/^[A-Za-z0-9._%+-]+@{1}([A-Za-z0-9._%+-]{1,5}).[A-Za-z]{1,9}$/';

    if (preg_match($patternCheckNumber, $_POST['numberPhone'])) {
        $message = "Неверный номер телефона!";
        $checker = true;
    } else {
        return false;
    }


    if (preg_match($patternCheckEmail, $_POST['email'])) {
        $message = "Неверный почтовый адресс!";
        $checker = true;
    } else {
        return false;
    }


    $message = strip_tags($_POST['message']);

    if ((strlen($message) > 5 and strlen($message) <=250)) {
        $message = "длинна сообщения должна составлять от 5 до 250 символов";
        $checker = true;
    } else {
        return false;
    }

    return $checker;
}

if (!isset($_POST['send'])) {
    header("Location: http://${_SERVER['SERVER_NAME']}/page.php?id=contacts");
}

if (checkForm($_POST)) {
    header("Location: http://${_SERVER['SERVER_NAME']}/components/success.php");
} else {
    header("Location: http://${_SERVER['SERVER_NAME']}/page.php?id=contacts");
}



?>