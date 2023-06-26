<?php

$title = 'Create Articles';
ob_start(); ?>

<h1>Изменить статью</h1>


<form action="<?=$_SERVER['PHP_SELF']?>?page=articles&action=update&id=<?=$article[0]['id']?>" method="post">
    <input  type="hidden" value="1" name="active">
    <label class="form-label" for="name_articles">Название статьи: </label>
    <input class="form-control" id="name_articles" type="text" name="title" value="<?=$article[0]['title']?>"><br>
    <label class="form-label" for="">Краткое описание статьи: </label>
    <input class="form-control" type="text" name="description" value="<?=$article[0]['description']?>"><br>
    <textarea class="form-control" name="content" id="" cols="30" rows="10" ><?=$article[0]['content']?></textarea><br>
    <label class="form-label" for="">Картинка для статьи</label>
    <select class="form-select" name="link_image" id="">
        <option value='test.jpg'>test</option>
        <option value='test2.jpg'>test</option>
    </select><br>
    <label class="form-label" for="">Категория статьи</label>
    <select class="form-select" name="category_id" id="">
        <option value='1'>1</option>
        <option value='1'>2</option>
    </select><br>
    <label class="form-label" for="">Имя пользователея</label>
    <select class="form-select" name="author_id" id="">
        <option value='1'>1 автор</option>
        <option value='1'>2 автор</option>
    </select><br>
    <button class="btn btn-success" type="submit">Update</button>
</form>



<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>
