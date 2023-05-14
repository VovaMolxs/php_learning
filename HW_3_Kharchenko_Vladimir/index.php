<?php

function sqrt_1($num) {
    if (is_int($num)) {
        return $num**3;
    } else {
        return "Передано не число!";
    }
}

function sum_2($a, $b) {
    if (is_int($a) && is_int($b)) {
        return $a + $b;
    } else {
        return "Передано не число!";
    }
}

function zad_3($a) {
    if ($a > 0 && $a < 8) {
        switch ($a) {
            case 1: return "Понедельник";
            case 2: return "Вторник";
            case 3: return "Среда";
            case 4: return "Четверг";
            case 5: return "Пятница";
            case 6: return "Суббота";
            case 7: return "Воскресенье";
        }
    }  else {
        return "Упс! Что-то пошло не так!";
    }
}


function zad_4($a) {
    if ($a < 0) {
        return true;
    } else {
        return false;
    }
}

function getDigitsSum($digit) {
    if (is_int($digit)) {
        $digit = (string)$digit;
        $sum = 0;
        for ($i = 0; $i < strlen($digit); $i++) {
            $sum += $digit[$i];
        }
        return $sum;
    } else {
        return "Упс! Что-то пошло не так!";
    }
}


function years($a, $b) {
    if (is_int($a)&&
        is_int($b) &&
        $a > 0 &&
        $a <= date('Y') &&
        $b <= date('Y') &&
        $b > 0) {
        $arrayYears = [];
        while ($a <= $b) {
            if (getDigitsSum($a) == 13) {
                array_push($arrayYears, $a);
                $a++;
            } else {
                $a++;
            }
        }
        return $arrayYears;
    } else {
        return "Что-то пошло не так!";
    }
}


function isEven($a) {
    if (is_int($a)) {
      if ($a % 2 == 0){
          return true;
      }else {
          return false;
      }
    } else {
        return "Упс! Что-то пошло не так!";
    }
}


function transLit($str) {
    $trns = [
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"'","э"=>"e","ю"=>"yu","я"=>"ya",
    ];
    return strtr($str, $trns);
}


// Сделайте функцию, которая возвращает множественное или единственное
//число существительного. Пример: 1 яблоко, 2 (3, 4) яблока, 5 яблок. Функция
//первым параметром принимает число, а следующие 3 параметра — форма
//для единственного числа, для чисел два, три, четыре и для чисел, больших
//четырех, например, func(3, 'яблоко', 'яблока', 'яблок').

function zad_9($num, $str_one, $str_two, $str_other) {
    if(is_int($num) && $num > 0) {
        switch ($num) {
            case 1: return $str_one;
            case 2:
            case 3:
            case 4:return $str_two;
            case 5: return $str_other;
        }
    } else {
        return "Что-то пошло не так!";
    }
}

$arr = [1, 2, 3, 4, 5];
function zad_10($array) {
    echo array_shift($array);
    if (count($array) !== 0) {
        zad_10($array);
    }
}



function zad_11($num) {
    if (($num = getDigitsSum($num)) > 9) {
        echo zad_11($num);
    } else {
        return $num;
    }
}

// Рассчитать скорость движения машины и выведите её в удобочитаемом
//виде. Осуществить возможность вывода в км/ч, м/c. Представить решение
//задачи с помощью одной функции.

function zad_12($lenght, $time, $typeSpeed = 'km/h') {
    if (is_int($lenght) && is_int($time)) {
        if ($typeSpeed == 'km/h') {
            return $speed = ($lenght) / ($time);
        } else if ($typeSpeed == 'm/s') {
            return $speed = ($lenght * 1000) / ($time * 3600);
        } else {
            return "Неверный параметр типа скорости(должен быть km/h или m/s";
        }
    }
}

//echo zad_12(1000, 1, 'km/h');

//Даны 2 слова, определить можно ли из 1ого слова составить 2ое, при
//условии что каждую букву из строки 1 можно использовать только один раз.

function zad_13($str1, $str2) {
    if (strlen($str2) == similar_text($str1, $str2)) {
        return true;
    } else {
        return false;
    }
}

echo var_dump(zad_13('hello', 'heloo'));



//14. Палиндромом называют последовательность символов, которая читается
//как слева направо, так и справа налево. Напишите функцию по определению
//палиндрома по переданному параметру.

function zad_14($str) {
    $len = strlen($str);
    $str = mb_strtolower($str);
    $result = true;
    for ($i = 0; $i <= (int)($len / 2); $i++) {
        if ($str[$i] == $str[$len - $i - 1]) {
            continue;
        } else {
            $result = false;
            break;
        }
    }
    return $result;
}

echo var_dump(zad_14('testtset'));

//15. Создание функцию создания таблицы умножения в HTML-документе в
//виде таблицы с использованием соотв. тегов.

function zad_15() {
    for ($i = 1; $i < 11; $i++) {
        echo "<tr>";
        for ($j = 1; $j < 11; $j++) {
            echo "<th>" . ($j * $i) . "</th>";
        }
        echo "</tr>";
    }
}



    function zad_16($str) {
        if (!is_string($str)) return false;

        $array = mb_split(" ", $str);
        $result = $array[0];

        foreach ($array as $value) {
            if (strlen($value) > strlen($result)) {
                $result = $value;
            }
        }
        return $result;
    }


    function zad_17($a, $b) {
        $counter = 0;
        for ($a; $a <= $b; $a++) {
            $counter += substr_count($a, 1);
        }
        return $counter;
    }

function zad_18($text, $n) {
    return wordwrap($text, $n, "<br>", false);
}
?>

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
1. Сделайте функцию, которая возвращает куб числа. Число передается
параметром.
<br>
<?=sqrt_1(10);?>
<hr>
2. Сделайте функцию, которая возвращает сумму двух чисел. Числа
передаются параметрами функции.
<br>
<?=sum_2(2, 10); ?>
<hr>
3. Сделайте функцию, которая принимает параметром число от 1 до 7, а
возвращает день недели на русском языке.
<br>
<?=zad_3(3);?>
<hr>
4. Сделайте функцию, которая параметром принимает число и проверяет -
отрицательное оно или нет. Если отрицательное - пусть функция вернет true,
а если нет - false.
<br>
<?=var_dump(zad_4(10));?>
<hr>
5. Сделайте функцию getDigitsSum (digit - это цифра), которая параметром
принимает целое число и возвращает сумму его цифр.
<br>
<?=getDigitsSum(12345); ?>
<hr>
6. Найдите все года от 1 до 2020, сумма цифр которых равна 13. Для этого
используйте вспомогательную функцию getDigitsSum из предыдущей задачи.
<br>
<?=var_dump(years(1, 2020)); ?>
<hr>
7. Сделайте функцию isEven() (even - это четный), которая параметром
принимает целое число и проверяет: четное оно или нет. Если четное - пусть
функция возвращает true, если нечетное - false.
<br>
<?=var_dump(isEven(13));?>
<hr>
8. Сделайте функцию, которая принимает строку на русском языке, а
возвращает ее транслит.
<br>
<?=transLit("ПРивет");?>
<hr>
9. Сделайте функцию, которая возвращает множественное или единственное
число существительного. Пример: 1 яблоко, 2 (3, 4) яблока, 5 яблок. Функция
первым параметром принимает число, а следующие 3 параметра — форма
для единственного числа, для чисел два, три, четыре и для чисел, больших
четырех, например, func(3, 'яблоко', 'яблока', 'яблок').
<br>
<?=zad_9(3, 'яблоко', 'яблока', 'яблок');?>
<hr>
10. Дан массив с числами. Выведите последовательно его элементы
используя рекурсию и не используя цикл.
<br>
<?=zad_10([1,3,2,4,5]);?>
<hr>
11. Дано число. Сложите его цифры. Если сумма получилась более 9-ти,
опять сложите его цифры. И так, пока сумма не станет однозначным числом
(9 и менее).
<br>
<?=zad_11(999);?>
<hr>
12. Рассчитать скорость движения машины и выведите её в удобочитаемом
виде. Осуществить возможность вывода в км/ч, м/c. Представить решение
задачи с помощью одной функции.
<br>
<?=zad_12(1000, 24, 'km/h'); ?>
<hr>
13. Даны 2 слова, определить можно ли из 1ого слова составить 2ое, при
условии что каждую букву из строки 1 можно использовать только один раз.
<br>
<?=var_dump(zad_13('hello', 'he')); ?>
<hr>
14. Палиндромом называют последовательность символов, которая читается
как слева направо, так и справа налево. Напишите функцию по определению
палиндрома по переданному параметру.
<br>
<?=var_dump(zad_14('testtset'));?>
<hr>
15. Создание функцию создания таблицы умножения в HTML-документе в
виде таблицы с использованием соотв. тегов.
<br>
<table>
    <?php zad_15(); ?>
</table>
<hr>
16. Дана строка с текстом. Напишите функцию определения самого длинного
слова.
<br>
<?=zad_16('прив пока как твои делишки и настроение');?>
<hr>
17. Напишите функцию определения суммарного количества единиц в числах
от 1 до 100.
<br>
<?=zad_17(1, 100); ?>
<hr>
18. Напишите функцию, которая разбивает длинную строку тегами <br> так,
чтобы длина каждой подстроки была не более N символов. Новая подстрока
не должна начинаться с пробела.
<br>
<?=zad_18('Напишите функцию, которая разбивает длинную строку тегами так,
чтобы длина каждой подстроки была не более N символов. Новая подстрока
не должна начинаться с пробела', 6); ?>

</body>
</html>
