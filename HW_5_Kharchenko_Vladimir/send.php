<?php
function checkForm() {
    if (!isset($_POST['send'])) return false;
    echo "check 1 <br>";
    if (empty($_POST['userName']) || empty($_POST['email']) || empty($_POST['numberPhone']) || empty($_POST['message'])) {
        return false;
    }
    echo "check 2 <br>";
    $patternCheckNumber = '/\+[0-9]{3}\s[0-9]{2}\s[0-9]{3}-[0-9]{2}-[0-9]{2}/';
    $patternCheckEmail = '/^[A-Za-z0-9._%+-]+@{1}[A-Za-z0-9._%+-]+.[A-Za-z]{1,5}/';

    if (!preg_match($patternCheckNumber, $_POST['numberPhone'])) {
        return false;
    }
    echo "check 3 <br>";
    if (!preg_match($patternCheckEmail, $_POST['email'])) {
        return false;
    }
    echo "check 4 <br>";
    $message = strip_tags($_POST['message']);

    if (!(strlen($message) > 5 and strlen($message) <=250)) {
        return false;
    }
    echo "check 5 <br>";
    return true;
}

if (!isset($_POST['send'])) {
    header('Location: http://test/page.php?id=contacts');
}

if (checkForm($_POST)) {

    header('Location: http://test/components/success.php');
} else {

    header('Location: http://test/page.php?id=contacts');
}



?>