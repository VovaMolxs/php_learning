<?php

$title = 'Articles';
ob_start(); ?>

<h1>Список статей</h1>
<a href="<?=$_SERVER['REQUEST_URI']?>&action=create" class="btn btn-success">Добавить статью</a>



    <?php foreach ($articles as $article): ?>

        <div class='container'>
            <div class='border border-2 rounded-5 border-success m-2 p-3  shadow-lg text-center'>
                <div class='d-flex flex-row mb-3'>
                    <div class='item_chapter me-5'>
                        <img src='app/views/icon/<?php echo $article['categories_image'] ?>' alt='img_chapter'>
                        <p class="text-success"><span><?php echo $article['name'] ?></span></p>
                    </div>
                    <div class='item_author'>
                        <img src='app/views/icon/2.png' alt='img_author'>
                        <p class="text-primary"><span><?php echo $article['first_name']; echo $article['last_name']?></span></p>
                    </div>
                </div>
                <div class='item_name'>
                    <a href='index.php/?page=articles&action=article&id=<?=$article['id']?>'>
                    <p class="fs-3"><?php echo $article['title'] ?></p>
                    </a>
                </div>
                <div class='item_desc'>
                    <p class="fs-3">
                        <?php echo $article['description'] ?>
                    </p>
                </div>
                <div class='item_img'>
                    <img class='img' src='app/views/img/<?php echo $article['link_image'] ?>' alt=''>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php $content = ob_get_clean();
include 'app/views/layout.php';
?>

