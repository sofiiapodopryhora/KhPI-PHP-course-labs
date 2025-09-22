<?php

// вивід тексту
echo "Hello World!<p>";

// оголошення змінних різних типів:
$string = "Halo-halo";
$int = 9;
$float = 13.3;
$bool = true;

// виведення значення змінних на екран, використовуючи функцію echo:
echo "змінна - рядок: $string<br>";
echo "змінна - ціле число: $int<br>";
echo "змінна - число з крапкою: $float<br>";
echo "булева змінна: $bool<br>";

// виведення типу кожної змінної, використовуючи функцію var_dump:
echo "<p>";
var_dump($string);
var_dump($int);
var_dump($float);
var_dump($bool);

// конкатенація рядків:
echo "<p>";
$f_string = "Where ";
$s_string = "are you?";
$concatenation = $f_string . $s_string;
echo $concatenation;

// реалізація на парність числа:
echo "<p>";
$num = 9;
if ($num % 2 == 0){
    echo "$num is double number";
} else {
    echo "$num is not double number";
}

// реалізація циклу for та while:
echo "<p>";
echo "iteration while (10 до 1):<p>";

$i = 10; // початкове значення

while ($i >= 1) { // умова виконання
    echo $i . "<p>";
    $i--;
}

//створення масиву і вивід значень
echo "<p>";
$student = [
    "first_name" => "Софія",
    "last_name" => "Подопригора",
    "age" => 19,
    "speciality" => 122
];

echo "<p>";
echo "Info about student:</p>";

foreach ($student as $key => $value) {
    echo "<p><strong>$key:</strong> $value</p>";
}

// додавання середнього балу
echo "<p>";
$student["average_grade"] = 4.9;
foreach ($student as $key => $value) {
    echo "$key: $value";
}

