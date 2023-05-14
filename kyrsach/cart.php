<?php
session_start(); // начинаем сессию
if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = array(); // инициализируем массив чисел
}

if (isset($_POST['add_number'])) { // проверяем, была ли отправлена форма добавления числа
    $number = $_POST['number']; // получаем число из формы
    $count = $_POST['count']; // получаем число из формы
    for ($i = 0; $i < $count; $i++) {
        array_push($_SESSION['numbers'], $number);
    } // добавляем число в конец массива
    header('Location: ' . $_SERVER['REQUEST_URI']); // перенаправляем пользователя на эту же страницу
    exit(); // прерываем выполнение скрипта
}

if (isset($_POST['remove_number'])) { // проверяем, была ли отправлена форма удаления числа
    $index = $_POST['index']; // получаем индекс числа, которое нужно удалить
    if (isset($_SESSION['numbers'][$index])) { // проверяем, существует ли элемент с указанным индексом
        unset($_SESSION['numbers'][$index]); // удаляем элемент из массива
    }
    header('Location: ' . $_SERVER['REQUEST_URI']); // перенаправляем пользователя на эту же страницу
    exit(); // прерываем выполнение скрипта
}
function getCartLength(){return  count ($_SESSION['numbers']) ;
    }
