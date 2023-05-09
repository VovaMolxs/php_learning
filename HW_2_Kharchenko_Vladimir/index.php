<?php
function zad_1($a) {
    if (empty($a)) {
        echo "<p class='badge bg-success'>Верно! (переменная пустая!)</p>";
    } else {
        echo "<p class='badge bg-danger'>Неверно! (переменная не пустая!)</p>";
    }
}

function zad_2($a)
{
    $a = $a . "";
    $a[1] = '0';
    $a = (int)$a;
    echo $a;
}

function zad_3($a, $b)
{
    if ($a <= 1 and $b >= 3) {
        echo $a + $b;
    } else {
        echo $a - $b;
    }
}

function zad_4($str)
{
    if ($str[0] == 'a') {
        echo "<p class='badge bg-success'>Да</p>";
    } else {
        echo "<p class='badge bg-danger'>Нет</p>";
    }
}

function zad_5($str) {
    $sumleft = $str[0] + $str[1] + $str[2];
    $sumright = $str[3] + $str[4] + $str[5];

    if ($sumleft == $sumright) {
        echo "<p class='badge bg-success'>Да</p>";
    } else {
        echo "<p class='badge bg-danger'>Нет</p>";
    }
}


function zad_6($degree)
{
    $i = 0;
    $time = 1;
    while ($i <= 360) {
        if ($degree >= $i and $degree <= ($i + 30)) {
            echo "<p class='badge bg-success'>" . $time . "</p>";
            break;
        } else {
            $time++;
            $i += 30;
        }
    }
}

function zad_7($a, $b)
{
    $sum = 0;
    foreach (range($a, $b) as $value) {
        if ($value % 5 == 0) {
            $sum += $value;
        }
    }
    echo "<p class='badge bg-success'>" . $sum . "</p>";
}


function zad_8($num)
{
    $num = $num . '';
    for ($i = 0; $i < strlen($num); $i++) {
        if ($num[$i] % 2 == 0) {
            $num[$i] = 0;
        }
    }
    $num = (int)$num;
    echo "<p class='badge bg-success'>" . $num . "</p>";
}


function zad_9_while($number)
{
    $counter = 0;
    while ($number >= 50) {
        $number /= 2;
        $counter++;
    }
    echo $counter . " - проходов";
}

function zad_9_for($number)
{
    for ($i = 0; $i < $number; $i++) {
        if ($number < 50) {
            echo $i . " - проходов";
            break;
        } else {
            $number /= 2;
        }
    }
}

function kvadrat($a)
{
    for ($i = 0; $i < $a; $i++) {
        for ($j = 0; $j < $a; $j++) {
            echo " *";
        }
        echo "<br>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<p class="h6 text-center">Если переменная \$a пустая, то выведите 'Верно', иначе выведите 'Неверно'.
Проверьте работу скрипта при \$a, равном 1, 3, -3, 0, null, true, '', '0'</p>

    <div class="row d-flex align-items-center">
        <div class="col-8">
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения 1</p></div>
                    <div class="col-6"><?=zad_1(1); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения 3</p></div>
                    <div class="col-6"><?=zad_1(3); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения -3</p></div>
                    <div class="col-6"><?=zad_1(-3); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения 0</p></div>
                    <div class="col-6"><?=zad_1(0); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения null</p></div>
                    <div class="col-6"><?=zad_1(null); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения true</p></div>
                    <div class="col-6"><?=zad_1(true); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения ''</p></div>
                    <div class="col-6"><?=zad_1(''); ?></div>
                </div>
                <div class="row">
                    <div class="col-6"><p class="text-center">При вводe значения '0'</p></div>
                    <div class="col-6"><?=zad_1('0'); ?></div>
                </div>
            </div>
        <div class="col-4 ">
                <code>
                    function zad_1($a) {<br>
                    if (empty($a)) {<br>
                    echo "<p class='badge bg-success'>Верно! (переменная пустая!)</p>";<br>
                    } else {<br>
                    echo "<p class='badge bg-danger'>Неверно! (переменная не пустая!)</p>";
                    }<br>
                    }
                </code>
            </div>
    </div>
    <hr>

<p class="h6 text-center">Дано трехзначное число. Поменяйте среднюю цифру на ноль.</p>

    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-8"><p class="text-end">Результат выполнения: </p></div>
                <div class="col-3"><p class='badge bg-success'><?=zad_2(123); ?></p></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_2($a) {<br>
                $a = $a."";<br>
                $a[1] = '0';<br>
                $a = (int) $a;<br>
                echo $a;<br>
                }
            </code>
        </div>
    </div>

<p class="h6 text-center">Если переменная $a равна или меньше 1, а переменная $b больше или
равна 3, то выведите сумму этих переменных, иначе выведите их разность
(результат вычитания). Проверьте работу скрипта при $a и $b, равном 1 и 3, 0
и 6, 3 и 5.</p>

    <div class="row ">
        <div class="row  d-flex align-items-center">
            <div class="col-8">
                <div class="row">
                    <div class="col-10"><p class="text-end">При $a = 1 и $b = 3 : </p></div>
                    <div class="col-2"><p class='badge bg-success'><?=zad_3(1, 3); ?></p></div>
                </div>
                <div class="row">
                    <div class="col-10"><p class="text-end">При при $a = 0 и $b = 6 : </p></div>
                    <div class="col-2"><p class='badge bg-success'><?=zad_3(0,6); ?></p></div>
                </div>
                <div class="row">
                    <div class="col-10"><p class="text-end">При при $a = 3 и $b = 5 : </p></div>
                    <div class="col-2"><p class='badge bg-success'><?=zad_3(3, 5); ?></p></div>
                </div>
            </div>
            <div class="col-4">
                <code>
                    function zad_3($a, $b) {<br>
                    if ($a3 <= 1 and $b3 >= 3) {<br>
                    echo $a3 + $b3;<br>
                    } else {<br>
                    echo $a3 - $b3;<br>
                    }<br>
                    }
                </code>
            </div>
        </div>
    </div>



<hr>

<p class='h6 text-center'>Дана строка с символами, например, 'abcde'. Проверьте, что первым
символом этой строки является буква 'a'. Если это так - выведите 'да', в
противном случае выведите 'нет'.</p>

<hr>

    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">Для теста строка вида = abcde</p></div>
                <div class="col-2"><?=zad_4('abcde'); ?></div>
            </div>
            <div class="row">
                <div class="col-10"><p class="text-end">Для теста строка вида = gfdg</p></div>
                <div class="col-2"><?=zad_4('gfdg'); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_4($str) {<br>
                if ($str[0] == 'a') {<br>
                echo "<p class='badge bg-success'>Да</p>";<br>
                } else {<br>
                echo "<p class='badge bg-danger'>Нет</p>";<br>
                }<br>
                }
            </code>
        </div>
    </div>

    <hr>

<p class='h6 text-center'>Дана строка из 6-ти цифр. Проверьте, что сумма первых трех цифр
равняется сумме вторых трех цифр. Если это так - выведите 'да', в противном
случае выведите 'нет'.</p>

    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">Результат следующей строки = 123456</p></div>
                <div class="col-2"><?=zad_5('123456'); ?></div>
            </div>
            <div class="row">
                <div class="col-10"><p class="text-end">Результат следующей строки = 123321</p></div>
                <div class="col-2"><?=zad_5('123321'); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_5($str) {<br>
                $sumleft = $str[0] + $str[1] + $str[2];<br>
                $sumright = $str[3] + $str[4] + $str[5];<br>

                if ($sumleft == $sumright) {<br>
                echo "<p class='badge bg-success'>Да</p>";<br>
                } else {<br>
                echo "<p class='badge bg-danger'>Нет</p>";<br>
                }<br>
                }
            </code>
        </div>
    </div>

<hr>

<p class="h6 text-center">Разработайте программу, которая определяла количество прошедших
часов по введенным пользователем градусах. Введенное число может быть от
0 до 360.</p>

    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">При градусе равном 45</p></div>
                <div class="col-2"><?=zad_6(45); ?></div>
            </div>
            <div class="row">
                <div class="col-10"><p class="text-end">При градусе равном 189</p></div>
                <div class="col-2"><?=zad_6(189); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function mytime($degree) {<br>
                $i = 0;<br>
                $time = 1;<br>
                while ($i <= 360) {<br>
                if ($degree >= $i and $degree <= ($i + 30)) {<br>
                echo "<p class='badge bg-success'>" . $time . "</p>";<br>
                break;<br>
                } else {<br>
                $time++;<br>
                $i += 30;<br>
                }<br>
                }<br>
                }<br>
            </code>
        </div>
    </div>

    <hr>

<p class="h6 text-center">Разработайте программу, которая из чисел 20 .. 45 находила те, которые
делятся на 5 и найдите сумму этих чисел.</p>

    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">Сумма всех чисел которые делятся на 5</p></div>
                <div class="col-2"><?=zad_7(20, 45); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_7($a, $b)<br>
                {<br>
                $sum = 0;<br>
                foreach (range($a, $b) as $value) {<br>
                if ($value % 5 == 0) {<br>
                $sum += $value;<br>
                }<br>
                }<br>
                echo "<p class='badge bg-success'>" . $sum . "</p>";<br>
                }
            </code>
        </div>
    </div>

    <hr>

<p class="h6 text-center">Дано пятизначное число. Цифры на четных позициях «занулить».
Например, из 12345 получается число 10305.</p>

    <div class="row  d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">Зануление чисел на четных позициях числа 123456789</p></div>
                <div class="col-2"><?=zad_8(12345678); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_8($num) {<br>
                $num = $num.'';<br>
                for ($i = 0; $i < strlen($num); $i++) {<br>
                if ($num[$i] % 2 == 0) {<br>
                $num[$i] = 0;<br>
                }<br>
                }<br>
                $num = (int) $num;<br>
                echo "<p class='badge bg-success'>" . $num . "</p>";<br>
                    }
            </code>
        </div>
    </div>

    <hr>

<p class="h6 text-center">Дано число \$num=1000. Делите его на 2 столько раз, пока результат
деления не станет меньше 50. Какое число получится? Посчитайте
количество итераций, необходимых для этого (итерация - это проход цикла).
Решите задачу сначала через цикл while, а потом через цикл for.</p>

    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">Результат цикла while</p></div>
                <div class="col-2"><?=zad_9_while(1000); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_9_while($number) {<br>
                $counter = 0;<br>
                while ($number >= 50) {<br>
                $number /= 2;<br>
                $counter++;<br>
                }<br>
                echo $counter . " - проходов";<br>
                }
            </code>
        </div>
    </div>
    <hr>
    <div class="row d-flex align-items-center">
        <div class="col-8">
            <div class="row">
                <div class="col-10"><p class="text-end">Результат цикла for</p></div>
                <div class="col-2"><?=zad_9_for(1000); ?></div>
            </div>
        </div>
        <div class="col-4">
            <code>
                function zad_9_for($number) {<br>
                for ($i = 0; $i < $number; $i++) {<br>
                if ($number < 50) {<br>
                echo $i . " - проходов";<br>
                break;<br>
                } else {<br>
                $number /= 2;<br>
                }<br>
                }<br>
                }
            </code>
        </div>
    </div>
<hr>

<p class="h6 text-center"> Вывести на экран фигуру из звездочек: (квадрат из n строк, в каждой строке n звездочек</p>

    <div class="row">
        <div class="col-8">
            <?=kvadrat(5); ?>
        </div>
        <div class="col-4">
            <code>
                function kvadrat($a) {<br>
                for ($i = 0; $i < $a; $i++) {<br>
                for ($j = 0; $j < $a; $j++) {<br>
                echo " *";<br>
                }<br>
                echo "&lt;br&gt;";
                }<br>
                }
            </code>
        </div>
    </div>


</div>
</body>
</html>