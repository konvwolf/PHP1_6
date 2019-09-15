<?php

/**
 * Функция в качестве аргумента принимает путь до конкретной папки и "собирает"
 * все ее содержимое в массив. Точка и две точки из массива исключаются. Функция
 * возвращает массив с названиями найденных в папке объектов
 */
function scanDir4Files($dir) {
    $fileList = scandir($dir);
    array_splice($fileList, 0, 2);
    return $fileList;
}

/**
 * Функция-калькулятор. Принимает на вход две числовые и тип арифметического действия.
 * Проводит вычисления в зависимости от типа арифметического действия. Делить на нуль
 * нельзя
 */
function calculateThis($num1, $num2, $action) {
    switch ($action) {
        case "minus":
            echo $num1 - $num2;
            break;
        case "plus":
            echo $num1 + $num2;
            break;
        case "divide":
            echo ($num2 == 0) ? "DIV BY 0" : $num1 / $num2;
            break;
        case "multiply":
            echo $num1 * $num2;
    }
}


// Вызов функции калькулятора
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$act = $_POST['action'];
if ($act) {
calculateThis ($num1, $num2, $act);
}