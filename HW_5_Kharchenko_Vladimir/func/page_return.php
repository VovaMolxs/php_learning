<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/func/pagesData.php';

function pageReturn($page, $pagesData) {
    if (empty($page))  return header('Location: http://test/components/404.php');
    foreach ($pagesData as $key => $value) {
        if ($key == $page) {
            return $value;
        }
    }

}

?>