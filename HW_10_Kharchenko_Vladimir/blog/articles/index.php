<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/body.php';
$sqlResultCategories = $mysqli->query('SELECT id, name FROM categories');



//логика работы пагинации при нажатии нужной страницы
if (isset($_GET['pg'])) {
    $pageNumber = $_GET['pg'];
} else {
    $pageNumber = 1;
}

$size_page = 5;
$offset = ($pageNumber-1) * $size_page;


//вывод информации для авторизированных пользователй
if (!empty($_SESSION['login'])) {
    $linkAddArticles = "
    <p><span>${_SESSION['first_name']} ${_SESSION['last_name']}</span> если вы хотите добавить свою статью, то нажмите по ссылке ниже</p>
    <a href='../add/'>Добавить статью</a>
    <a href='/reg/logout.php?do=exit'>Выйти из акааунта</a>
    <a href='/'>На главную страницу</a>
    <br>
    ";
} else {
    $linkAddArticles = "
    <p>Для того чтобы получить возможность создавать статьи, вам необходимо авторизироваться или зарегистрироваться</p>
    <a href='/reg'>Войти в свой акаунт</a>
    <a href='/reg/reg.php'>Зарегистрироваться</a><br>
    ";
}

?>



    <form action="/articles/" method="get">
        <?=$linkAddArticles; ?>
        <label for="">Выбрать тематику нужных статей:</label>
        <select name="categories_id" id="">
            <option value=''>Все статьи</option>
            <?php
            if ($sqlResultCategories->num_rows) {
                while ($row = mysqli_fetch_assoc($sqlResultCategories)) {
                    var_dump($row);
                    echo "<option value='${row['id']}'>${row['name']}</option>";
                }
            }
            ?>

        </select><br>
        <button type="submit">отсортировать</button>
    </form>

<?php
if (!empty($_GET['categories_id'])) {

    $get = $_GET['categories_id'];
    $pagination = paginationArticles($mysqli, $get);

    $result = $mysqli->query("SELECT post.id, title, content, date, description, link_image, categories.name, categories.categories_image,
    authors.first_name, authors.last_name FROM post
    JOIN categories ON post.category_id = categories.id
    JOIN authors ON post.author_id = authors.id WHERE categories.id = ${get} ORDER BY date DESC LIMIT ${size_page} OFFSET ${offset}");
} else {
    $pagination = paginationArticles($mysqli);
    $result = $mysqli->query("SELECT post.id, title, content, date, description, link_image, categories.name, categories.categories_image,
    authors.first_name, authors.last_name FROM post
    JOIN categories ON post.category_id = categories.id
    JOIN authors ON post.author_id = authors.id ORDER BY date DESC LIMIT ${size_page} OFFSET ${offset}");



}


if ($result->num_rows) {
    while ($row = mysqli_fetch_assoc($result)) {
        //echo var_dump($row);
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
                    <p><span>${row['first_name']} ${row['last_name']}</span></p>
                </div>
            </div>
            <div class='item_name'>
                <a href='article.html?id=${row['id']}'>
                    <h1>${row['title']}</h1>
                </a>
            </div>
            <div class='item_desc'>
                <h2>
                    ${row['description']}
                </h2>
            </div>
            <div class='item_img'>
                <img class='img' src='img/${row['link_image']}' alt=''>
            </div>
        </div>
    </div>

    ";


    }
} else {
    echo "статей нету";
}

echo $pagination;


?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/footer.php';

