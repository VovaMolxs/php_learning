<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
if ($_GET['do'] == 'exit') {
    unset($_SESSION['login']);
    header('Location: /');
}
?>