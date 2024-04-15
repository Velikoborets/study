<?php

/******* КОД ДЛЯ ПОДКЛЮЧЕНИЯ К БД *******/
/*
    $host = 'localhost';
    $user = 'root';
    $password = 'Gtahzby7711';
    $db_name = 'test_db';

$db_connection = (mysqli_connect($host, $user, $password,$db_name));
*/



/******* КОД ДЛЯ ФОРМИРОВАНИЯ ЗАПРОСОВ К БД *******/

// Запрос на вывод всей таблицы (c выводом ошибок):
/*
    $query = "SELECT * FROM console_users";
    $db_query = mysqli_query($db_connection, $query) 
    or die (mysqli_error($db_connection));
*/

// Запрос на доп. задание кодировки:
/*
    $query_utf8 = "SET NAME console_users 'utf-8'";
    $db_query_utf8 = mysqli_query($db_connection, $query_utf8);
*/

// Запрос на добавление данных user:
/*
    $query_add_user = "INSERT INTO users (name, age, salary) 
    VALUES ('user3', 40, 600)";
    mysqli_query($db_connection, $query_add_user);
*/



/******* ВЫВОД ОПРЕДЕЛЕННЫХ ДАННЫХ  *******/

// Запрос на вывод всех данных, о user1:
/*
    $query = "SELECT name, age, salary FROM users 
    WHERE name='user1'";
    $db_query = mysqli_query($db_connection, $query);
*/

// Запрос на вывод зарплат (больше 400 но меньше 600)
// И людей с возрастом от 22 до 65 , при поиске по всей таблице:
/*
    $query ="SELECT * FROM users WHERE (age >= 22 AND age <= 65) 
    AND (salary > 400 AND salary < 600)";
    $db_query = mysqli_query($db_connection, $query);
*/



/******* ИЗМЕНЕНИЕ, УДАЛЕНИЕ ДАННЫХ *******/

// Запрос на изменение данных user (изменение записи):
/*
$query_change_user = "UPDATE users SET age=23 WHERE 
(id > 1 AND id < 3)";
$db_query_change_user = 
mysqli_query($db_connection, $query_change_user) 
 or die (mysqli_error($db_connection));

// если не писать команду WHERE, то обновления захватят всю табл.
*/

// Запрос на удаление данных:
// $query_delete = "DELETE FROM users WHERE age=23";
/*
    $query_delete = "DELETE FROM users";
    $db_query_delete_user = mysqli_query($db_connection, $query_delete) 
    or die (mysqli_error($db_connection));
*/



/******* СОРТИРОВКА ЗАПИСЕЙ *******/

// Запрос на сортировку от меньшего к большему:
/*
    $query_sort = "SELECT * FROM console_users ORDER BY age";
    $db_query = mysqli_query($db_connection, $query_sort) 
     or die (mysqli_error($db_connection));
*/

// Запрос на сортировку от большего к меньшему (DESC):
/*
    $query_sort = "SELECT * FROM console_users ORDER BY age DESC";
    $db_query = mysqli_query($db_connection, $query_sort) 
    or die (mysqli_error($db_connection));
*/

// Запрос на сортировку нескольких полей:
// (Сначала сортируем всех по возрасту, у кого он одинаковый -
// Сортируем всех по id - по убыванию):
/*
$query_sort = "SELECT * FROM console_users WHERE age=22 ORDER
 *  BY id DESC";
$db_query = mysqli_query($db_connection, $query_sort) 
 * or die (mysqli_error($db_connection));
*/



/******* ОГРАНИЧЕНИЕ КОЛИЧЕСТВА ЗАПИСЕЙ *******/

// Вывод первых 2 юзера (помним, что отсчёт, нач. с 1-го):
// $query_limit = SELECT * FROM console_users LIMIT 2;

// Вывод юзеров со второго, 3 штуки.
// $query_limit = SELECT * FROM console_users LIMIT 2,3;

// Вывод юзеров по возрастанию id и получить первых 2-х
// $query_limit = SELECT * FROM console_users ORDER BY id LIMIT



/******* ПОДСЧЁТ КОЛ-ВА СТРОК В КОНСОЛИ И 
 * ПОЛУЧЕНИЕ РЕЗУЛЬТАТА В СКРИПТЕ *******/

// Запросы на получение количества срок:
// Считаем кол-во строк где возраст 22:
// $query = SELECT COUNT(*) FROM console_users WHERE age=22;

// Считаем общее кол-во строк:
// $query = SELECT COUNT(*) FROM console_users;

// ПОЛУЧЕНИЕ РЕЗУЛЬТАТА ПОДСЧЁТА В СКРИПТЕ

// При подсчёте строк и выводе элементов в виде массива.
// Результат будет такой:
//'COUNT(*)' => string '4' (length=1)

// Чтобы легче было его вывести, можно  переименовать(AS):
/*
$query_count = "SELECT COUNT(*) as count FROM console_users";
$db_query= mysqli_query($db_connection, $query_count) 
 * or die(mysqli_error($db_connection));
*/
// Теперь результат будет такой:
//'count' => '4' (length=1)



/******* ВЫВОД ВСЕХ ДАННЫХ ПО ТАБЛИЦЕ ЧЕРЕЗ ЦИКЛ *******/
/*
for ($table_users = []; $user_data = mysqli_fetch_assoc($db_query); 
 $table_users[] = $user_data);
var_dump($table_users);
*/


?>