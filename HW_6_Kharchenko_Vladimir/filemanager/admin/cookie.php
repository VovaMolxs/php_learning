<?php

if (!empty($_COOKIE['authorization'])) {
    echo "
        <a href='logout.php'>Выйти из админки</a>
    ";
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/', 404);
}




?>