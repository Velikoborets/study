<?php



/*** ВВЕДЕНИЕ В БАЗЫ ДАННЫХ SQL В PHP ДЛЯ НОВИЧКОВ 315/338 ✓ ***/

// БД - место в котором хранятся данные сайта.
// Данные - (тексты, данные usr, pass, каталог итд). 
// БД состоит из таблиц, а таблицы из строк и столбцов.

// Часто, столбцы называют полями, а строки - записями.
// Сама БД представл. собой прогу, на серваке.
// Которая хранит в себе данные и позволяет их получать и изменять

// Получение и изменение данных происходит с помощью запросов.
// (Команд написанных на языке SQL)



/*** РАБОТА С БАЗАМИ ДАННЫХ ЧЕРЕЗ PHPMYADMIN 316/338 ✓ ***/

// AutoIncrement - нумерация id (каждая вновь добав. запись будет иметь уникальный числовой номер). )

// Кодировка у utf8 должна быть: utf8_general_ci;


// ДЗ (РАБОТА С БД):
// 1 ✓  
// Создайте базу данных test.

// 2 ✓
// Создайте таблицу users.

// 3 ✓
// Создайте таблицу users.
// В этой таблице сделайте 4 поля (столбца): id, тип integer, name, тип varchar, 32 символа, name, тип varchar, 32 символа, age, тип integer, birthday, тип date.

// 4  ✓
// Найдите вкладку 'вставить' и с ее помощью вставьте несколько строк в эту таблицу.
// (Имеется ввиду, что вставлять надо не ДОПОЛНИТЕЛЬНУЮ СТРОКУ В ТАБЛИЦУ А просто значения - Вася, Пупкин, 1992 итд.)

// 5 ✓
// Поредактируйте какую-нибудь запись.

// 6 ✓
// Удалите какую-нибудь запись.

// 7 ✓
// Кодировка меняется в операциях

// 8 ✓
// Переименуйте таблицу.

// 9 ✓
// Переименуйте БД



/*** РАБОТА С БАЗАМИ ДАННЫХ ЧЕРЕЗ PHPMYADMIN 317/338 ✓ ***/

// 1 ✓
// Создайте базу данных mydb.
// а в ней таблицу users с указанным выше содержимым.

// 2 ✓
// Сделайте дамп этой таблицы (экспорт), 
// чтобы в дальнейшем вы могли ее легко восстановить.


/* ПОДГОТОВ. МАНИПУЛЯЦИИ ДЛЯ РАБОТЫ С SQL В PHP 318/338 ✓ */

// Чтобы установить соед. с сервером БД, в page2.php, испол. фу-ю:
// mysql_connect (имя хоста, имя user, pass, имя БД);

// $host = 'localhost'; 	// имя хоста
// $user = 'root';			// имя user

// $pass = 'Gtahzby7711';	// пароль
// $db_name = 'my_db';		// имя БД

// Установим соединение с БД:
// $db_connect = mysqli_connect($host, $user, $pass, $db_name);



/* ОТПРАВКА ЗАПРОСОВ К БАЗЕ ДАННЫХ 319/338 ✓ */

// $db_connect = mysqli_connect($host, $user, $pass, $db_name);
// $query = 'SELECT * FROM users';

// После соединения с БД к ней можно отправлять запросы, с пом. фу-ии:
// $db_query = mysqli_query($db_connect, $query);



/**** ПОИСК ОШИБОК В БАЗЕ ДАННЫХ 320/338 ✓ ****/

// Чтобы вывести ошибки при SQL запросах, следует К КАЖДОМУ ЗАПРОСУ к БД добавлять "or die(mysqli_error($db_connect))"

// И у нас выходит:
// $res = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));

// *
// Если есть подключение и запрос проходит то работаем
// Если чего-то нет, завершаем скрипт и выводим ошибку SQL



/**** ТЕСТИРОВАНИЕ РАБОТОСПОСОБНОСТИ БАЗЫ ДАННЫХ 321/338 ✓ ****/

/*
// Подключение к БД:
$user_name = 'root';
$password = 'Gtahzby7711';
$db_name = 'my_db';
$host = 'localhost';

//                              куда    имя         пароль   и к чему
$db_connection = mysqli_connect($host, $user_name, $password, $db_name);

// Формируем запросы с выводом ошибок:
$query = 'SELECT * FROM users';
$db_query = mysqli_query($db_connection, $query) or die (mysqli_error($db_connection));

var_dump($db_query); */



/**** ПРОБЛЕМЫ С КОДИРОВКАМИ ПРИ РАБОТЕ С SQL В PHP 322/338 ✓ ****/

// Чтобы корректно выводилась кирилица, надо выполнить 4 действия:

// 1. кодировка должна быть utf8_general_ci
// 2. Сам РНР файл должен быть в кодировке utf8
// 3. <meta charset="utf-8"> В начале php файла (page2.php)
// 4. mysqli_query($link, "SET NAMES 'utf8'");



/** ДОП. ТЕСТОВЫЙ КОД ДЛЯ ПРОВЕРКИ РАБОТОСПОСОБНОСТИ 323/338 ✓ **/

/* Добавим к нашему коду, кодировку, чтобы избежать "абракадабры"
<meta charset="utf-8">
<?php

// Подключение к БД:
$user_name = 'root';
$password = 'Gtahzby7711';
$db_name = 'my_db';
$host = 'localhost';

$db_connection = mysqli_connect($host, $user_name, $password, $db_name);

// доп. запрос для задания кодировки utf8
mysqli_query($db_connection, "SET NAMES 'utf8'");

// Формируем запросы с выводом ошибок:
$query = 'SELECT * FROM users';
$db_query = mysqli_query($db_connection, $query) or die (mysqli_error($db_connection));

var_dump($db_query);
*/



/** ПОЛУЧЕНИЕ РЕЗУЛЬТАТА ПРИ SQL ЗАПРОСЕ В PHP 324/338 ✓ **/

// Чтобы получить результат запроса (таблицу В ВИДЕ МАССИВА) используем функцию:

// Выведет данные работника 1
// $table_user1 = mysqli_fetch_assoc($db_query);
// var_dump($table_user1);

// (При следующем вызове) Выведет данные работника 2
// $table_user2 = mysqli_fetch_assoc($db_query);
// var_dump($table_user2);

// Можно вызывать пока есть данные
// Когда закончатся выведет null



/** ПОЛУЧЕНИЕ РЕЗ-ТАТА В ВИДЕ ARR ПРИ SQL ЗАПРОСЕ В PHP 325/338 ✓ **/

// Можно создать массив
// $arr_users = [];
// и туда записать всех работников:

// $table_user1 = mysqli_fetch_assoc($db_query);
// $arr_users[] = $table_users1;

// $table_user2 = mysqli_fetch_assoc($db_query);
// $arr_users[] = $table_users2;

// var_dump($arr_users); // двухмерный массив с работниками



/** ФОРМИРОВАНИЕ МАССИВА В ЦИКЛЕ ПРИ SQL ЗАПРОСЕ В PHP 326/338 ✓ **/

// Гораздно удобнее с помощью цикла записать всех работников:
//for ($users_table = []; $user = mysqli_fetch_assoc($db_query); $users_table[] = $user);

// for (пустой массив; записываем фу-ю в $user; записываем $user в пустой массив, пока $user не станет null);

//var_dump($users_table); // здесь будет массив с результатом

// ДЗ (формирование массива в цикле при sql запросе в php):

// 1
// С помощью описанного цикла получите и выведите через var_dump на экран массив всех работников.
// var_dump($users_table);

// 2
// Из полученного результата получите первого работника. Через echo выведите на экран его имя.
// for ($users_table = []; $user = mysqli_fetch_assoc($db_query); $users_table[] = $user);
// var_dump($users_table[0]);
// echo $users_table[0]['name'];

// 3
// Из полученного результата получите второго работника. Через echo выведите на экран его имя и возраст.
//for ($users_table = []; $user = mysqli_fetch_assoc($db_query); $users_table[] = $user);
// var_dump($users_table[1]);
// echo $users_table[1]['name'] . '<br>';
// echo $users_table[1]['age'];



/** ВЫБОРКА ЗАПИСЕЙ ПРИ SQL ЗАПРОСЕ К БАЗЕ В PHP 327/338 ✓ **/

// $query = "SELECT * FROM таблица WHERE условие";
// WHERE - усл. где можем записать ограничение на выбираемые записи.
// (Допустимы все операции сравнения, кроме эквивалентноси === итд)

// Прим.1
// Выберем юзера с id, равным 2
// $query = "SELECT * FROM users WHERE id=2";

// Аналогично будет и с (id>=2, id!=2, id>2);
// Вместо id можем вбить 'salary', 'age' и.т.д

// Нюанс с именем, т.к оно яв. строкой, то его надо взять в кавычки:
// $query = "SELECT * FROM users WHERE name='user1'";

// ДЗ (выборка записей при SQL запросе к БАЗЕ в РНР):
// 1
// Выберите юзера с id, равным 3.
// for ($users_table = []; $user = mysqli_fetch_assoc($db_query); $users_table[] = $user);
// $query = 'SELECT * FROM users WHERE id=3'

// 2
// Выберите юзеров с зарплатой 900, более 400, Выберите юзеров с зарплатой равной или большей 500, не 500.
// for ($users_table = []; $user = mysqli_fetch_assoc($db_query); $users_table[] = $user);
// $query = 'SELECT * FROM users WHERE salary 500';
// $query = 'SELECT * FROM users WHERE salary>400';
// $query = 'SELECT * FROM users WHERE salary>=500';
// $query = 'SELECT * FROM users WHERE salary!=500';




/** ЛОГИЧЕСКИЕ ОПЕРАЦИИ В SQL ЗАПРОСЕ В PHP 328/338 ✓ **/

// Как и в РНР, можно делать более сложные запросы
// Используя команды AND, OR
// $query = 'SELECT * FROM users WHERE salary!=500 OR age=22';

// Зарплата от 450 до 900:
// $query = "SELECT * FROM users WHERE salary>450 AND salary<900"

// Возраст от 23 до 27:
// $query = "SELECT * FROM users WHERE age>=23 AND age<=27";

// Длинные комбинации можно групироватть с помощью круглых скобок, чтобы показать приоритет условий:
// $query = "SELECT * FROM users WHERE (age<20 AND age>27) OR (salary>300 AND salary<500)";

// ДЗ (Логические операции):
// 3
// Выберите юзеров user1 и user2.
// $query = 'SELECT * FROM users WHERE (name=\'user1\') or (name=\'user2\')';

// 4
// Выберите всех, кроме юзера user3.
// $query = 'SELECT * FROM users WHERE name != \'user3\'';

// 5
// Выберите всех юзеров в возрасте 22 лет или с зарплатой 500.
// $query = 'SELECT * FROM users WHERE age = 22 OR salary = 500';

// 6
// Выберите всех юзеров в возрасте 22 лет или с зарплатой не равной 400.
// $query = 'SELECT * FROM users WHERE age = 22 OR salary != 400';

// 8
// Выберите всех юзеров в возрасте от 23 лет до 27 лет или с зарплатой от 400 до 1000.
// $query = 'SELECT * FROM users WHERE (age >= 22 AND age <= 27) OR (salary > 400 AND salary < 1000)';



/** ПОЛЯ ВЫБОРКИ ПРИ SQL ЗАПРОСЕ В PHP 329/338 ✓ **/

// Чтобы не попадали все столбцы таблицы,
// Можно указать какие конкретно поля нам нужны, с какими условиями:
// $query = "SELECT name, age FROM users WHERE id >= 3";

// 1
// Выберите из таблицы users имя, возраст и зарплату для каждого работника.
// $query = "SELECT name, age, salary FROM users";

// 2
// Выберите из таблицы users имена всех работников.
// $query = "SELECT name FROM users";



/** ВСТАВКА ЗАПИСЕЙ ЧЕРЕЗ SQL ЗАПРОС В PHP 330/338 ✓ **/

// Чтобы добавить нового user:
// 1. Нужно сформировать новый запрос на его добавление
// 2. Подключиться к БД и отправить его

// Например:
// Пишем запрос на добавления user:
// $query_for_add_user = "INSERT_INTO users (name, age, salary) VALUES ('user7', 25, 1000)";
// Подключаемся и отправляем запрос в БД:
// $db_query_for_add_user = mysqli_query ($db_connection, $query_for_add_user) or die(mysqli_error($db_connection));


// Результат  можем посмотреть в phpmyadmin
// Или вывести с пом. др. запроса всю таблицу.

// ДЗ
// 1
// Добавьте нового юзера 'user7', 26 лет, зарплата 300.
// Запрос на добавление нового user:
// $query_added_user = "INSERT INTO users (name, age, salary) VALUES ('user7', 26, 300)";
// Коннектимся к БД и отправляем запрос:
// $db_query_added_user = mysqli_query($db_connection, $query_added_user) or die (mysqli_error($db_connection));



/** ВСТАВКА ЗАПИСЕЙ ПРИ ОТСУТСТВУЮЩИХ СТОЛБЦАХ ЧЕРЕЗ SQL ЗАПРОС В PHP 331/338 ✓ **/

// $query_add_user = "INSERT INTO users (name, age) VALUES ('user')";
//  mysqli_query($db_connection, $query_added_user) or die (mysqli_error($db_connection));

// Если мы работая со вставкой запроса, не укажем значение, это приведет к ошибке:
// Column count doesn't match value count at row 1



/** ОБНОВЛЕНИЕ ЗАПИСЕЙ ЧЕРЕЗ SQL ЗАПРОС В PHP 332/338 ✓ **/

// Запрос на изменение записи:
// $query = "UPDATE таблица SET полe = значениe WHERE условие";

// Пример 1:
// (изменим возраст и зп user)
// $query = "UPDATE users SET age=20, salary=800 WHERE id=1";
// (измени таблицу и задай такие-то пара-ры, такому-то)

// если не использовать команду WHERE, то изменения захватят всю таблицу.

// ДЗ (обновления записей через sql запрос в рнр):
// 1 ✓
// Используя созданный ранее вами дамп таблицы users приведите ее в исходное состояние.

// 2
// Юзеру с id 3 поставьте возраст 35 лет.
// $query_change_user = "UPDATE users SET age=35 WHERE id=3";

// 3
// Всем, у кого зарплата 500, сделайте ее 700.
// $query_change_user = "UPDATE users SET salary=700 WHERE salary=500";

// 4
// Работникам с id больше 2 и меньше 5 включительно поставьте возраст 23.
// $query_change_user = "UPDATE users SET age=23 WHERE (id > 1 AND id < 3)";



/** УДАЛЕНИЕ ЗАПИСЕЙ ЧЕРЕЗ SQL ЗАПРОС В PHP 333/338 ✓ **/

// $query_delete = "DELETE FROM таблица WHERE  условие";

// ДЗ (удаление записей из таблицы):
// 1
// Удалите юзера с id, равным 1
// $query_delete = "DELETE FROM таблица WHERE  условие";

// 2
// Удалите всех юзеров, у которых возраст 23 года
// $query_delete = "DELETE FROM users WHERE age=23";

// 3
// Удалите всех юзеров
// $query_delete = "DELETE FROM users";



/** СОРТИРОВКА ЗАПИСЕЙ ЧЕРЕЗ SQL ЗАПРОС В PHP 334/338 ✓ **/

// Сортировка таблицы от меньшего к большему
// $query = "SELECT * FROM имя табл ORDER BY age";

// Если хотим наоборт то в конце добавляем DESC
// $query = "SELECT * FROM имя табл ORDER BY age DESC";

// Можно сортировать по нескольким полям:
// $query = "SELECT * FROM users ORDER BY age, salary";

// ДЗ (сортировка записей через sql-запрос в рнр)
// 1
// Запрос на сортировку от меньшего к большему:
/*
$query_sort = "SELECT * FROM console_users ORDER BY age";
$db_query = mysqli_query($db_connection, $query_sort) or die (mysqli_error($db_connection));
*/

// 2
// Запрос на сортировку от большего к меньшему (DESC):
/*
$query_sort = "SELECT * FROM console_users ORDER BY age DESC";
$db_query = mysqli_query($db_connection, $query_sort) or die (mysqli_error($db_connection));
*/

// 3
// Достаньте юзер с одинаковым возрастом и отсортируйте их по убыванию id:
/*
$query_sort = "SELECT * FROM console_users WHERE age=22 ORDER BY id DESC";
$db_query = mysqli_query($db_connection, $query_sort) or die (mysqli_error($db_connection));
*/



/** ОГРАНИЧЕНИЕ КОЛИЧЕСТВА ЗАПИСЕЙ В SQL В PHP 335/338 ✓ **/

// LIMIT - ограничивает кол-во строк в рез-тате вывода.

// Запрос на выбор первых 2х юзеров (отсчёт с 0)
// $query_limit = "SELECT * FROM users LIMIT 2";

// Выберем всех юзеров с возрастом 22, и с пом. LIMIT
// Выберем первого из  них:
// $query_limit = "SELECT * FROM users WHERE age=22 LIMIT 1";

// Выберем 2 и 3 юзера (нумерация строк с нуля):
// $query_limit = "SELECT * FROM console_users LIMIT 1,2";

// Можно комбинировать с ORDER BY.
// Сначала идёт ORDER BY, потом LIMIT:
// (отсорт. записи по возрастанию, а потом возьмем первые 3 шт.)
// $query_limit = "SELECT * FROM console_users ORDER BY age LIMIT 3";

// ДЗ (Ограничение количества записей):

// 1
// Получите первых 2 юзера (помним, что отсчёт, нач. с 1-го):
// $query_limit = SELECT * FROM console_users LIMIT 2;

// 2
// Получите юзеров со второго, 3 штуки.
// $query_limit = SELECT * FROM console_users LIMIT 2,3;

// 3
// Отсортировать юзеров по возрастанию id и получить первых 2-х
// $query_limit = SELECT * FROM console_users ORDER BY id LIMIT 2;



/** ПОДСЧЕТ КОЛИЧЕСТВА СТРОК ЧЕРЕЗ SQL ЗАПРОС В PHP 336/338 ✓ **/

// Считаем кол-во строк где возраст 22:
// $query = SELECT COUNT(*) FROM console_users WHERE age=22;

// Считаем общее кол-во строк:
// $query = SELECT COUNT(*) FROM console_users;



/******* ПОДСЧЁТ КОЛ-ВА СТРОК В КОНСОЛИ И ПОЛУЧЕНИЕ РЕЗУЛЬТАТА В СКРИПТЕ 337/338 ✓ *******/

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
$db_query= mysqli_query($db_connection, $query_count) or die(mysqli_error($db_connection));
*/

// Теперь результат будет такой:
//'count' => '4' (length=1)

// ДЗ (получение результата подсчёт в скрипте):
// 1
// Все юзеры в возрасте 22
// SELECT COUNT(*) FROM console_users WHERE age=22;

// 2
// Все юзеры с возрастом 22 или id = 3;
//  SELECT COUNT(*) FROM console_users WHERE age=22 OR id=3;



/******* ПРОДВИНУТЫЕ SQL-ЗАПРОСЫ 338/338 ✓ *******/

// IN, MIN, MAX, GROUP BY, CONCAT, а также на функции для работы с датой.


?>