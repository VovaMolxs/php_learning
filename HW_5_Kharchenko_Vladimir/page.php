<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/data/pagesData.php';
//проверям запрос, был ли он сделан и передан ли id, если не айди или пустой запрос то редирект!

    if (!empty($_GET) || !$_GET['id']) {
        header("Location: /components/404.php");
        exit;
    }

    if (!array_key_exists($_GET['id'], $pagesData)) {
        header("Location: /components/404.php");
        exit;
    } else if ($_GET['id'] == 'home') {
        header("Location: /index.html");
        exit;
    }

    foreach ($pagesData as $key => $value) {
        if ($key == $_GET['id']) {
            if (!is_file($_SERVER['DOCUMENT_ROOT'] . '/components/' . $value)) {
                header("Location: /components/404.php");
                exit;
            }
            $link = $value;
        }
    }



//формируем шапку страницы
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/navigation.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/components/' . $link;


//формируем футер страницы
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'


?>