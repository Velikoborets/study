
<?php

/*** СВЯЗЫВАНИЕ ТАБЛИЦ В БД 339/346 ✓ ***/
    
// Есть стандартная таблица:
/*
    +----+------+--------+
    | id | name | city   |
    +----+------+--------+
    |  1 | Fred | London |
    |  2 | Dick | Berlin |
    |  3 | Vito | Minsk  |
    |  4 | Ivan | Minsk  |
    |  5 | Alex | Berlin |
    +----+------+--------+
*/

// Проблема:
// В которой, гипотетически 10 городв и 10000 юзеров
// У нас задача: вывести список городов, без "дублей"
// Из-за 10 городов, нам придется вывести 10000 юзеров
// Удалить дубли городов и только тогда получим список

// Решение проблемы:
// Разбиваем таблицу на две:
// В 1й таблице будут города
// Во 2й таблице будут юзеры (с юзерами будет колонка city_id
// которая будет ссылаться на город юзера).

// В результате у нас получается таблица users:
/*
    +----+--------+---------+
    | id | name   | city_id |
    +----+--------+---------+
    |  1 | Viktor |       1 |
    |  2 | Jack   |       1 |
    |  3 | Alex   |       3 |
    |  4 | Aron   |       3 |
    |  7 | Martin |       2 |
    +----+--------+---------+
*/

// И таблица city:
/*
    +----+-------+
    | id | name  |
    +----+-------+
    |  1 | Minsk |
    |  2 | Gomel |
    |  3 | Brest |
    +----+-------+
*/



/** ПОЛУЧЕНИИ ДАННЫХ ИЗ СВЯЗАННЫХ ТАБЛИЦ В PHP В БД 340/346 ✓ **/

// выбираем вывод : | список |=категория= =категория=| список |  

// Step1
/*
 *  Выбираем либо строки, либо целые таблицы (users.*, name.*)
 *  Для вывода, который будет в конце:
 * 
 *  SELECT users.name, city.name
 */

// Step2
/*
 *  Говорим, что хотим: 
 *  1.Таблицу список 
 *  2.Присоединить к таблице категории:
 *  
 *  FROM users LEFT to JOIN city
 */

// Step3
/*
 * К полям('id') таблице-категорий
 * присоединяем поля('list_id') таблицы-списка:
 * ON city.id=users.city_id   
 * 
 */

// Step4.
// В результате мы получаем таблицу с полями name и name 
// (для удобства можно прямо  в запросе переименовать
// какой-то из столбцов, на city_name, например
// SELECT users.name, city.name as city_name)
/*
    +-------+-------+
    | name  | name  |
    +-------+-------+
    | Vasya | Minsk |
    | Rita  | Minsk |
    | Ivan  | Gomel |
    | Zina  | Gomel |
    | Ola   | Brest |
    +-------+-------+
*/


// Всё, тоже самое, только для вывода указал не два поля,
// А 2 таблицы:

/*
    +----+-------+---------+------+-------+
    | id | name  | city_id | id   | name  |
    +----+-------+---------+------+-------+
    |  1 | Vasya |       1 |    1 | Minsk |
    |  2 | Rita  |       1 |    1 | Minsk |
    |  3 | Ivan  |       2 |    2 | Gomel |
    |  4 | Zina  |       2 |    2 | Gomel |
    |  5 | Ola   |       3 |    3 | Brest |
    +----+-------+---------+------+-------+
*/



/*** ЦЕПОЧКА СВЯЗАННЫХ ТАБЛИЦ 341/346 ✓ ***/

/*  
 *    Правильный запрос, на основе моего примера:
 * 
 * 1. Выбираем поля, которые хотим видеть в выводе:
SELECT table_products.products, table_categories.categories, table_shops.shops_name
 * 
 * 2. Таблицу список (уже готовый рез-тат), 
 *    присоединяем к таблице категории:
FROM table_products LEFT JOIN table_categories
 * 
 * 3. К полю таблице-категории, присоединяем поле таблицы-списка:
ON table_categories.id=table_products.id_for_categories 
 * 
 * 4. К table_categories (готовый рез. пункт 3) 
 *    присоед. таблицу table_shops
LEFT JOIN table_shops 
 * 
 * 5. К полю новой таблицы. Присоединяем, результат поля из п. 3
 * ON table_shops.id=table_categories. for_shops_id;
 *
 * 6. В результате у нас получается:
    +------------+----------+------------+
    | categories | products | shops_name |
    +------------+----------+------------+
    | shoes      | Converse | Evroopt    |
    | shoes      | Tufli    | Evroopt    |
    | clothes    | Hudi     | Santa      |
    | clothes    | Polo     | Santa      |
    | food       | meat     | Green      |
    | food       | fish     | Green      |
    +------------+----------+------------+
*
*/



/*** СВЯЗЫВАНИЕ ЧЕРЕЗ ТАБЛИЦУ СВЯЗИ В PHP 342/346 ✓ ***/

// У нас есть 2 таблицы:
/*  
    users
    +----+------+
    | id | name |
    +----+------+
    |  1 | Ivan |
    |  2 | Rita |
    |  3 | Mike |
    |  4 | Jes  |
    +----+------+

    city
    +----+-------+
    | id | name  |
    +----+-------+
    |  1 | Brest |
    |  2 | MInsk |
    |  3 | Gomel |
    +----+-------+

 */

// Нам надо сделать так, чтобы каждый юзер, мог ссылаться
// На несколько городов, где он к примеру был.

// Для этого создадим таблицу связи, которая будет связывать
// Юзера с его городами:

/*
    +----+----------+---------+
    | id | users_id | city_id |
    +----+----------+---------+
    |  1 |        1 |       1 |
    |  2 |        1 |       2 |
    |  3 |        1 |       3 |
    |  4 |        2 |       1 |
    |  5 |        2 |       2 |
    |  6 |        3 |       2 |
    |  7 |        3 |       3 |
    |  8 |        4 |       1 |
    +----+----------+---------+
 * 
 * 1. Выбираем поля
 * SELECT users.name, city.name 
 * 
 * 2. Соединяем таблицу список с связной таблицей
 * FROM users 
 * LEFT JOIN users_and_city 
 * 
 * 3. К поле id таблице связи присоединияем поле id users
 * ON users_and_city.users_id=users.id 
 * 
 * 4. К сохр. результату присоединяем таблицу, категорий
 * LEFT JOIN city 
 * 
 * 5. К поле id связной таблицы, присоединиям поле id city
 * ON users_and_city.city_id=city.id;
 * 

*/

// Результат нашего запроса в PHP будет содержать имя каждого юзера столько раз, в скольких городах он был: 
/*
    +------+-------+
    | name | name  |
    +------+-------+
    | Ivan | Gomel |
    | Ivan | MInsk |
    | Ivan | Brest |
    | Rita | MInsk |
    | Rita | Brest |
    | Mike | Gomel |
    | Mike | MInsk |
    | Jes  | Brest |
    +------+-------+
*/



/*** РОДСТВЕННЫЕ СВЯЗИ ДАННЫХ В PHP 343/346 ✓ ***/

/*

У  нас есть таблица animals
+----+--------+-----------+
| id | name   | parent_id |
+----+--------+-----------+
|  1 | Lion   |         0 |
|  2 | Tiger  |         1 |
|  3 | Bear   |         0 |
|  4 | Panda  |         3 |
|  5 | Baboon |         2 |
+----+--------+-----------+

Мы хотим получить информацию о каждом животном и его родителе в виде:
+--------+--------+
| animal | parent |
+--------+--------+
| Lion   | NULL   |
| Tiger  | Lion   |
| Bear   | NULL   |
| Panda  | Bear   |
| Baboon | Tiger  |
+--------+--------+


Для этого мы напишем SQL-запрос, который будет связывать таблицу animals сама с собой:

// 1. Выбираем все поля из таблицы animals:

SELECT * FROM animals


// 2. Затем мы выполняем LEFT JOIN таблицы animals с копией самой  //    себя, которую мы переименуем в parents: 

LEFT JOIN animals AS parents ON parents.id = animals.parent_id



// Но, для красивости вывода, так сказать:
 * 
// 1. Мы указываем поля, которые хотим получить в результате.
// 2. И наконец, собираем все вместе:
 
SELECT animals.name AS animal, parents.name AS parent
FROM animals
LEFT JOIN animals AS parents ON parents.id = animals.parent_id


// 5.Этот запрос вернет таблицу с двумя столбцами: animal и parent. В строках, где животное не имеет родителя будет NULL.
    +--------+--------+
    | animal | parent |
    +--------+--------+
    | Lion   | NULL   |
    | Tiger  | Lion   |
    | Bear   | NULL   |
    | Panda  | Bear   |
    | Baboon | Tiger  |
    +--------+--------+
*/


?> 

