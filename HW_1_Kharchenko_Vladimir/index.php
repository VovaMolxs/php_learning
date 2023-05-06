<?php
require('func.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="content">
    <p>Сумма: <?php echo sum(10, 2); ?></p>
    <p>Разность: <?php echo razn(10, 2); ?></p>
    <p>Частное: <?php echo chastnoe(10, 2); ?></p>
    <p class="name">Упражнение 3</p>
    <p>$result = <?php echo $result ?></p>
    <p class="name">Упражнение 4</p>
    <p><?php echo $text1 . " " . $text2?></p>
    <p class="name">Упражнение 5</p>
    <p><?php echo name("Vova")?></p>
    <p class="name">Упражнение 6</p>
    <p><?php echo sumNum('11111')?></p>
    <p class="name">Упражнение 7</p>
    <p><?php echo " Количество секунд с начала года - " . my_time(); ?></p>
    <p class="name">Упражнение 8</p>
    <p><?php echo time_h_m_s(); ?></p>
    <p class="name">Упражнение 9</p>
    <?php
    $var = 1;
    $var += 12;
    $var -= 14;
    $var *= 5;
    $var /= 7;
    $var++;
    $var--;
    ?>

    <p><?php echo $var ?></p>

    <p><?php echo time_h_m_s(); ?></p>
    <p class="name">Упражнение 10</p>
    <p><?php echo FLname("Vladimir", "Kharchenko", "Olegovich", "28"); ?></p>
</div>



</body>
</html>