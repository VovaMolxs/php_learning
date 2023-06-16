<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/header.php';

if (!empty($_SESSION['login'])) {
    $linkAddArticles = "
    <p><span>${_SESSION['first_name']} ${_SESSION['last_name']}</span> если вы хотите добавить свою статью, то нажмите по ссылке ниже</p>
    <a href='../add/'>Добавить статью</a>
    <a href='/'>На главную страницу</a><br>
    <a href='/reg/logout.php?do=exit'>Выйти из акааунта</a>
    <br>
    ";
} else {
    $linkAddArticles = "
    <p>Для того чтобы получить возможность создавать статьи, вам необходимо авторизироваться или зарегистрироваться</p>
    <a href='/reg'>Войти в свой акаунт</a>
    <a href='/reg/reg.php'>Зарегистрироваться</a><br>
    ";
}

if (!empty($_GET['id'])) {
    $result = $mysqli->query('SELECT post.id, title, content, date, description, link_image, categories.name, categories.categories_image, 
    authors.first_name, authors.last_name FROM post 
    JOIN categories ON post.category_id = categories.id 
    JOIN authors ON post.author_id = authors.id WHERE post.id =' . $_GET['id']);

    $row = mysqli_fetch_assoc($result);
    echo $linkAddArticles;
    echo "
    <div class='content'>
    <div class='blog_item'>
        <div class='item_head'>
            <div class='item_chapter'>
                <img src='icon/${row['categories_image']}' alt='img_chapter'>
                <p><span>${row['name']}</span></p>
            </div>
            <div class='item_author'>
                <img src='icon/2.png' alt='img_author'>
                <p>${row['first_name']} ${row['last_name']}</p>
            </div>
        </div>
        <div class='item_name'>
        <h1>${row['title']}</h1>

        </div>
        <div class='item_desc'>
            <h2>
    ${row['content']}
            </h2>
        </div>
        <div class='item_img'>
        <img class='img' src='img/${row['link_image']}' alt=''>
    </div>
    </div>
    </div>

    ";

} else {
            header('Location: /articles/');
        }


require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/footer.php';
?>
