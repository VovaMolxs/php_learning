<?php

$tile = "Article";

ob_start(); ?>

<?php foreach ($article as $art): ?>
    <a href="index.php?page=articles&action=delete&id=<?php echo $art['id'] ?>" class="btn btn-danger">Удалить статью!</a>
    <a href="index.php?page=articles&action=edit&id=<?php echo $art['id'] ?>" class="btn btn-primary">Изменить статью!</a>
    <div class='container'>
        <div class='border border-2 rounded-5 border-success m-2 p-3  shadow-lg text-center'>
            <div class='item_chapter me-5'>
                <div class='item_chapter'>
                    <!--<img src='app/views/icon/<?php echo $art['categories_image'] ?>' alt='img_chapter'>-->
                    <p class="text-success"><span>Название категории: <?php echo $art['name'] ?></span></p>
                </div>
                <div class='item_author'>
                    <!-- <img src='app/views/icon/2.png' alt='img_author'> -->
                    <p class="text-success">Автор: <span><?php echo $art['first_name']; echo $art['last_name']?></span></p>
                </div>
            </div>
            <div class='item_name'>
                    <h1><?php echo $art['title'] ?></h1>
            </div>
            <div class='item_desc'>
                <h2>
                    <?php echo $art['description'] ?>
                </h2>
            </div>
            <div class='item_img'>
                <img class='img' src='app/views/img/<?php echo $art['link_image'] ?>' alt=''>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
