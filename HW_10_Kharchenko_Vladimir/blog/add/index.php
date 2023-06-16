<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/body.php';

if (empty($_SESSION['login'])) {
    header('Location: /');
} {
    $linkAddArticles = "
    <p><span>${_SESSION['first_name']} ${_SESSION['last_name']} </span> вы хотите добавить статью, то заполните форму ниже</p>
    <a href='/reg/logout.php?do=exit'>Выйти из акааунта</a>
    <a href='/'>На главную страницу</a>
    <br>
    ";
}


$sqlResultCategories = $mysqli->query('SELECT id, name FROM categories');
$sqlResultAuthors = $mysqli->query('SELECT id, first_name, last_name FROM authors');
$pathImage = $_SERVER['DOCUMENT_ROOT'] . '/articles/img/';
$img = scandir($pathImage);



if (!empty($_POST)) {
    if (false !== ($result = checkFormAddArticles($_POST))) {
        insertToDb($mysqli, $result);
        echo "<h1 style='color: green; text-align: center'>Статья добавлена!</h1>";
    } else {
        echo "Ошибка!";
    }
}

echo $linkAddArticles;
?>



    <form action="../add/" method="post">
        <input type="hidden" value="1" name="active">
        <label for="name_articles">Название статьи: </label>
        <input id="name_articles" type="text" name="name_articles"><br>
        <label for="">Краткое описание статьи: </label>
        <input type="text" name="description_articles"><br>
        <textarea name="content_articles" id="" cols="30" rows="10" placeholder="Основной текст статьи"></textarea><br>
        <label for="">Картинка для статьи</label>
        <select name="image_articles" id="">
            <?php
                foreach ($img as $key => $value) {
                        if ($value == '.' || $value == '..' ) {

                        } else {
                            echo "<option value='${value}'>" . $value . "</option>";
                        }

                }
            ?>
        </select><br>
        <label for="">Категория статьи</label>
        <select name="categories_id" id="">
            <?php
            if ($sqlResultCategories->num_rows) {
                while ($row = mysqli_fetch_assoc($sqlResultCategories)) {
                    var_dump($row);
                    echo "<option value='${row['id']}'>${row['name']}</option>";
                }
            }
            ?>
        </select><br>
        <button type="submit">Добавить статью в базу данных</button>
    </form>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontend/footer.php';
?>