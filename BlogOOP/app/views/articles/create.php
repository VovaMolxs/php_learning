<?php

$title = 'Create Articles';
ob_start(); ?>

<h1>Создать статью</h1>

<form action="<?=$_SERVER['PHP_SELF']?>?page=articles&action=store" method="post">
    <input type="hidden" value="1" name="active">
    <label class="form-label" for="name_articles">Название статьи: </label>
    <input class="form-control" id="name_articles" type="text" name="title"><br>
    <label class="form-label" for="">Краткое описание статьи: </label>
    <input class="form-control" type="text" name="description"><br>
    <textarea  class="form-control" name="content" id="" cols="30" rows="10" placeholder="Основной текст статьи"></textarea><br>
    <label class="form-label" for="">Картинка для статьи</label>
    <select class="form-select" name="link_image" id="">
        <option value='test.jpg'>test</option>
        <option value='test2.jpg'>test</option>
    </select><br>
    <label class="form-label" for="">Категория статьи</label>
    <select class="form-select" name="category_id" id="">
        <?php foreach ($category as $key): ?>
        <option value='<?=$key['id']?>'><?=$key['name']?></option>
        <?php endforeach; ?>
    </select><br>
    <label class="form-label" for="">Имя пользователея</label>
    <select class="form-select" name="author_id" id="">
        <?php foreach ($authors as $key): ?>
            <option value='<?=$key['id']?>'><?php echo $key['first_name'] . " " . $key['last_name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <button class="btn btn-success" type="submit">Добавить статью в базу данных</button>
</form>



<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>
