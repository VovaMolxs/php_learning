<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo "/*
 * Если переменная \$a пустая, то выведите 'Верно', иначе выведите 'Неверно'.
Проверьте работу скрипта при \$a, равном 1, 3, -3, 0, null, true, '', '0
 */ <hr>";


$a = "sdfdsf";

if (empty($a)) {
    echo "Верно!";
} else {
    echo "Неверно!";
}

echo "<hr>";

echo "
/*
 * Дано трехзначное число. Поменяйте среднюю цифру на ноль.
 */ <hr>
";


$b = 123;

$b = $b."";
$b[1] = '0';
$b = (int) $b;
echo gettype($b);

echo "<hr>";

echo "
/*
 * Если переменная $a равна или меньше 1, а переменная $b больше или
равна 3, то выведите сумму этих переменных, иначе выведите их разность
(результат вычитания). Проверьте работу скрипта при $a и $b, равном 1 и 3, 0
и 6, 3 и 5.

 */
<hr>";

$a3 = 3;
$b3 = 5;

if ($a3 <= 1 and $b3 >= 3) {
    echo "сумма " . $a3 + $b3;
} else {
    echo "разность " . $a3 - $b3;
}

echo "<hr>";

echo "
/*
 * Дана строка с символами, например, 'abcde'. Проверьте, что первым
символом этой строки является буква 'a'. Если это так - выведите 'да', в
противном случае выведите 'нет'.
 */
<hr>";


$str = 'rbcde';
if ($str[0] == 'a') {
    echo "да";
} else {
    echo "нет";
}

echo "<hr>";

echo "
/*
 *  Дана строка из 6-ти цифр. Проверьте, что сумма первых трех цифр
равняется сумме вторых трех цифр. Если это так - выведите 'да', в противном
случае выведите 'нет'.

 */
<hr>";


$str6 = '123456';
$sumleft = $str6[0] + $str6[1] + $str6[2];
$sumright = $str6[3] + $str6[4] + $str6[5];

if ($sumleft == $sumright) {
    echo "Да";
} else {
    echo "Нет";
}

echo "<hr>";

echo "
/*
 *  Разработайте программу, которая определяла количество прошедших
часов по введенным пользователем градусах. Введенное число может быть от
0 до 360.
 */
<hr>";


function mytime($degree) {
    $i = 0;
    $time = 1;
    while ($i <= 360) {
        if ($degree >= $i and $degree <= ($i + 30)) {
            echo $time;
            break;

        } else {
            $time++;
            $i += 30;
        }
    }

}
mytime(120);
echo "<hr>";

echo "
/*
 * Разработайте программу, которая из чисел 20 .. 45 находила те, которые
делятся на 5 и найдите сумму этих чисел.
 */
<hr>";

$sum = 0;
foreach (range(20, 45) as $value) {
    if ($value % 5 == 0) {
        $sum += $value;
    }
}
echo $sum;
echo  "<hr>";

echo "
/*
 * Дано пятизначное число. Цифры на четных позициях «занулить».
Например, из 12345 получается число 10305.
 */
<hr>";


function null_number($num) {
$num = $num.'';
for ($i = 0; $i < strlen($num); $i++) {
    if ($num[$i] % 2 == 0) {
        $num[$i] = 0;
    }
}
$num = (int) $num;
echo $num;

}

null_number(12345);

echo "<hr>";

echo "
/*
 * Дано число \$num=1000. Делите его на 2 столько раз, пока результат
деления не станет меньше 50. Какое число получится? Посчитайте
количество итераций, необходимых для этого (итерация - это проход цикла).
Решите задачу сначала через цикл while, а потом через цикл for.

 */
<hr>";

$number = 1000;
$counter = 0;


while ($number >= 50) {
    $number /= 2;
    $counter++;
}

echo $counter . " - количество проходов";
echo "<hr>";

$number = 1000;

for ($i = 0; $i < $number; $i++) {
    if ($number < 50) {
        echo $i . " - количество проходов циклом for";
        break;
    } else {
        $number /= 2;
    }
}

echo  "<hr>";

echo "
/*
 * 10. Вывести на экран фигуру из звездочек: (квадрат из n строк, в каждой строке n звездочек
 */
<hr>";


function kvadrat($a) {
    for ($i = 0; $i < $a; $i++) {
        for ($j = 0; $j < $a; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}

kvadrat(5);



?>


</body>
</html>