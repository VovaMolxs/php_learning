<?php
$title = "Home";

ob_start();
?>

<h1>Home</h1>
<section class="alert alert-success">
    <header class="promo">
        <h2 class="text-center">Добро пожаловать в БЛОГ!</h2>
        <a href="index.php/?page=articles" class="cta ga-hero-cta">Войти в БЛОГ!</a>



    </header>

</section>

<?php $content = ob_get_clean();

include 'app/views/layout.php';
?>
