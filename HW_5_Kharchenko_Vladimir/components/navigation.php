<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
<!-- Navigation -->
<div class="container">
    <div class="row">
        <div class="logo-holder">
            <a class="logo-link" href="#">
                <img src="img/logo.png" alt="Treehouse home">
            </a>
        </div>
        <div class="navigation-holder" id="navigation">
            <ul class="navigation-list">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/func/pagesData.php';
                foreach ($pagesData as $key => $value) {
                    echo "<li class='navigation-list__list-item'><a href=\page.php?id=${key}>${key}</a></li>";
                }?>
            </ul>
        </div>

    </div>
</div>
<!-- //Navigation -->