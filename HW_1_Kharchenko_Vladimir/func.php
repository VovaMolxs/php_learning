<?php

function sum($a, $b) {
    return $a + $b;
}

function razn($a, $b) {
    return $a - $b;
}

function chastnoe($a, $b) {
    return $a / $b;
}
$a3 = 17;
$b3 = 10;
$c = $a3 - $b3;
$d = 7;
$result = $c + $d;


$text1 = 'Привет';
$text2 = 'Мир';

function name($name) {
    return "'Привет, %$name%!";
}
$name = 'Вова';

function sumNum($num) {
    $sum = 0;
    for ($i = 0; $i < strlen($num); $i++) {
        $sum += $num[$i];
    }
    return $sum;
}
/*
Напишите скрипт, который считает количество секунд в часе, в сутках, в
месяце, в году и сколько прошло секунд с начала 2000 года.
*/

//Я не понял, мы должны что-то передавать? типо количество лет и выводить секунды, минуты и т.д.?

function my_time() {
    echo time() - mktime(00, 0, 0, 1, 1, 2000);
}

function time_h_m_s() {
    $hour = date('H');
    $minute = date('i');
    $second = date('s');
    echo $hour . ":" . $minute . ":" . $second;
}

function FLname($first_name, $last_name, $middle_name, $age) {
    define("FIRSTNAME", "$last_name");
    if (defined('FIRSTNAME')) {
        echo "Меня зовут " . FIRSTNAME . " ({$first_name[0]}.{$middle_name[0]}). <br /> Мне {$age} лет.";
    }
/*
 "Меня зовут Иванов (И. И.).
Мне 5 лет.
 */
}
timezone_abbreviations_list()
?>