<?php


/*** ТЕСТОВАЯ ТАБЛИЦА USERS ДЛЯ ПРАКТИЧЕСКИХ ЗАДАЧ 347/352 ✓ ***/

// Создал в консоли таблицу users, наполнил ее содержимым, сделал ее дамп.(экспорт)



/*** ОФОРМЛЕНИЕ ВЫВОДА ИЗ БАЗЫ ДАННЫХ В PHP 348/352 ✓ ***/

// ДЗ 
 
// 1
// Вывести записи нашей таблицы в офрмленном виде:

// 1.1 Здесь у нас подкл. к БД.
// 1.2 Далее запрос с подкл. где вывод всей таблицы.

/* 1.3 Выведем все данные с помощью цикла
for ($data_table = []; $user_data = mysqli_fetch_assoc($db_query);
$data_table[] = $user_data);

// 1.4 оформление вывода выводимых данных в таблицу: 
<?php foreach ($data_table as $elem): ?>
<div>
    <h4><?=$elem['name']; ?></h4>
    <p>
        <?=$elem['age'] . ' ' . 'years ' ?> 
        <b><?=$elem['salary']?></b>
    </p>
</div>
<?php endforeach; ?> */


// 2
/* Вывести записи таблицы в оформленном виде:

<table>
<tr>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>salary</th>
</tr>
<?php foreach ($data_table as $elem): ?>
<tr>
    <td><?=$elem['id']; ?></td>
    <td><?=$elem['name']; ?></td>
    <td><?=$elem['age']; ?></td>
    <td><?=$elem['salary']; ?></td>
</tr>
<?php endforeach; ?>
</table> 

*/



/*** УДАЛЕНИЕ ДАННЫХ ИЗ БД С ПОМОЩЬЮ GET ЗАПРОСОВ 349/352 ✓ ***/

// Пишем в адр.строку браузера $_GET-параметр ?del=2
// И надо сделать, чтобы он в нашей таблице, удалял
// Пользователя с id=2
// $del = $_GET['del'];


// Пишем запрос на удаление:

// del - ключ, его знач. передаётся в id
// $query_delete = "DELETE FROM users WHERE id='$del'";
// $db_query_delete = mysqli_query($db_connection, $query_delete) // or die (mysqli_error($db_connection));

// Теперь запрос на вывод данных:
/*
$query = "SELECT * FROM users";
$db_query= mysqli_query($db_connection, $query) or die 
(mysqli_error($db_connection));

// Выведем все данные с помощью цикла:
for ($data_table = []; $user_data = mysqli_fetch_assoc($db_query);
$data_table[] = $user_data);
*/

// ДЗ

// 4
// Модифицируем пред.задачу, так, чтобы получилась табличка
// с удалением:

/*
<table>
<tr>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>salary</th>
</tr>
<?php foreach ($data_table as $elem): ?>
<tr>
    <td><?=$elem['id']; ?></td>
    <td><?=$elem['name']; ?></td>
    <td><?=$elem['age']; ?></td>
    <td><?=$elem['salary']; ?></td>
    <td><a href="?del=<?=$elem['id'] ?>">удалить</a></td>
</tr>
<?php endforeach; ?>
</table>
*/



/*** ПРОСМОТР ДАННЫХ ИЗ БД В PHP 350/352 ✓ ***/

/* 
// Запрос в БД на просмотр данных, где $id - это значение $_GET
$id = $_GET['id'];
$query_where = "SELECT * FROM users WHERE id='$id'";
$db_query_where= mysqli_query($db_connection, $query_where) or die
(mysqli_error($db_connection));

// Результат просмотра данных в записываем переменную:
$elem = mysqli_fetch_assoc($db_query_where);

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title> verstka </title>
</head>
<body>
    <div>

    // Вытаскиваем данные из БД и записываем их в html:
        <h5><?=$elem['name'] ?></h5>
        <p>
        age:<span class="age"><?=$elem['age']?></span>                     salary: <span class="salary"><?=$elem['salary']?></span>
        </p>
    </div>   
</body>
</html>


// ДЗ (просмотр данных из БД):
// 2
//  На странице index.php реализуйте вывод ссылок на просмотр каждого из юзеров: 


 * файл show.php

// 1. Код подкл. к БД
 
// 2. 
// В $_GET - параметр пишем id, 
// который связан с id, пользователя.

$id = $_GET['id'];
$query_where = "SELECT * FROM users WHERE id='$id'";
$db_query_where= mysqli_query($db_connection, $query_where) or die
(mysqli_error($db_connection));

// 3. Результат запроса сохраняем в переменную $elem;
$elem = mysqli_fetch_assoc($db_query_where);

// 4. Выводим данные из БД
echo '<pre>';
print_r($elem);
echo '<pre>';


 * файл page2.php

<!-- Какая-то вёрстка -->
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title> verstka </title>
</head>
<body>
    <div>
        // Кликаем на ссылку которая переводит на show.php
        <a href="show.php?id=8">user1</a>
        <a href="show.php?id=9">user2</a>
        <a href="show.php?id=10">user3</a>
    </div>   
</body>
</html>
*/



/*** ДОБАВЛЕНИЕ НОВОЙ ЗАПИСИ В БД НА PHP 351/352 ✓ ***/

/*
<!-- ИНПУТЫ ДЛЯ ВВОДА ДАННЫХ ЮЗЕРОМ -->
 
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title> verstka </title>
</head>
<body>
<form action="" method="POST">
    <input name="name">имя
    <input name="age">возраст   
    <input name="salary">зп
    <input type="submit">отпр
</form>
</body>
</html>


<?php
// когда форма отправлена
if (!empty($_POST)) {
    
    // засунь значения в переменные
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    
}

// И вставь эти значения в БД
$query = "INSERT INTO users SET name='$name', age='$age',          salary='$salary'";
$db_query = mysqli_query($db_connection, $query) or die 
(mysqli_error($db_connection));

?>

// ДЗ (Добавление новой записи)

// 1
// На странице new.php реализуйте форму 
// для добавления нового юзера в БД.
// и чтобы после отправки формы, значение не удалялись

// Подключение к БД:
$host = 'localhost';
$name = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connection = mysqli_connect($host, $name, $pass, $db_name);


// Если данные отпр. запиши в переменную,
// Иначе, пустая форма: ?>
<?php if (!empty($_POST)):?>
<?php $name = $_POST['name']; ?> 
<?php $age = $_POST['age']; ?>
<?php $salary = $_POST['salary']; ?>
<?php else: ?>
<!DOCTYPE html>
    <head>
        <title>send data</title>
    </head>
    <body>
        <form method="post">
            <input name="name" type="text"
            value="<?=$_POST['name'] ?? '' ?>">Имя<br>
            <input name="age" type="text" 
            value ="<?=$_POST['age'] ?? ''?>"> Возраст <br>
            <input name="salary" type="text"
            value ="<?=$_POST['salary'] ?? ''?>">Зарплата<br>
            <input type="submit">
        </form>  
    </body>
</html>
<?php endif; ?>
    

<?php

// Вывод $_POST, для проверки
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Вставляем значения из $_POST в БД
$query = "INSERT INTO users (name,age, salary) VALUES ('$name', $age, $salary)";
$db_query = mysqli_query($db_connection, $query) or die (mysqli_error($db_connection));
*/



/*** РЕДАКТИРОВАНИЕ ЗАПИСИ В БД НА PHP 352/352 ✓ ***/

// в page2.php сделаем форму:
/*
// Подключаемся к БД
$host = 'localhost';
$user = 'root';
$password = 'Gtahzby7711';
$db_name = 'test_db';

$db_connection = mysqli_connect($host, $user, $password, $db_name);


// id юзера будет значением GET - парметра
$id = $_GET['id'];

// Запрос на выбор юзера по id
$query = "SELECT * FROM users WHERE id=$id";
$db_query = mysqli_query($db_connection, $query) or die (mysqli_error($db_connection));


// Результат запроса, запишем в переменную
$user = mysqli_fetch_assoc($db_query);


// в форму загрузим результат юзера из БД ?>
<html>
    <head>
        <title>form</title>
    </head>
    <body>
<!-- Форму отправляем на show.php -->
<!-- При этом $_GET парам. будем перед. id user для редакт. -->
        <form action="show.php?id=<?=$_GET['id']?>" method="POST">
            <input name="name" value="<?=$user['name']; ?>">
            <input name="age" value="<?=$user['age']; ?>">
            <input name="salary" value="<?=$user['salary']; ?>">
            <input type="submit">
        </form>
    </body>
</html>
*/


// В show.php:
/* Принимаем данные:
$id = $_GET['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$salary = $_POST['salary'];

// Подключаемся к БД
$host = 'localhost';
$user = 'root';
$password = 'Gtahzby7711';
$db_name = 'test_db';

$db_connection = mysqli_connect($host, $user, $password, $db_name);

echo 'user successful change!!!';

// Запрос на редактирование данных юзера:
$query_change = "UPDATE users SET name='$name', salary=$salary, age=$age WHERE id='$id'";
$db_query_change = mysqli_query($db_connection, $query_change) or die (mysqli_error($db_connection));


// ДЗ (запрос на редактирование данных)

***************** файл page2.php ******************

 * // 1. Подключимся к БД
$host = 'localhost';
$user = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connection = mysqli_connect($host, $user, $pass, $db_name);

$query = "SELECT * FROM users";
$db_query = mysqli_query($db_connection, $query) or die (mysqli_error($db_connection));

// 2. Вытащим данные из БД и засунем их в массив
 for ($user_data = []; $user = mysqli_fetch_assoc($db_query); $user_data[] = $user);

?>

<!DOCTYPE html>
<head>
    <title>title</title>
</head>
<body>
    <form>
        <ul>
<!-- 
3. Переберем этот массив и выведем списком данные каждого юзера
4. id юзеров передадим в $_GET параметр с помощью ссылки 
-->
<?php foreach ($user_data as $elem): ?>
            <li>
<?=$elem['id'].' '.$elem['name'].' '.
$elem['age'].' '.$elem['salary']?>
            <a href="show.php?id=<?=$elem['id']?>">Изменить</a>
            </li>
<?php endforeach; ?>
        </ul>
    </form>
</body>
</html>
 

***************** файл show.php ******************
  
 // 1.Подключаемся к БД
$host = 'localhost';
$user = 'root';
$password = 'Gtahzby7711';
$db_name = 'test_db';

$db_connection = mysqli_connect($host, $user, $password, $db_name);

// 2. Принимаем id, которое передали $_GET - параметром
$id = $_GET['id'];

// 3. Выбираем из БД юзера на основе id, которое передали
//    С помощью $_GET
$query = "SELECT * FROM users WHERE id=$id";
$db_query = mysqli_query($db_connection, $query) or die (mysqli_error($db_connection));


// 4. Результат запроса (данные юзера), запишем в переменную
$user = mysqli_fetch_assoc($db_query);


// 5. В форму загрузим данные юзера из БД ?>
<html>
    <head>
        <title>form</title>
    </head>
    <body>
        <form method="POST">         
<!-- 
6. В значения формы запишем текущие данные из БД
7. Изменим их и отправим
-->
            <input name="name" value="<?=$user['name']; ?>">
            <input name="age" value="<?=$user['age']; ?>">
            <input name="salary" value="<?=$user['salary']; ?>">
            <input type="submit">
        </form>
    </body>
</html>

<?php

// 7. Примем значения после отправки:
$name = $_POST['name'];
$age = $_POST['age'];
$salary = $_POST['salary'];

// 8. Запрос на редактирование данных юзера:
$query_change = "UPDATE users SET name='$name', salary=$salary, age=$age WHERE id='$id'";
$db_query_change = mysqli_query($db_connection, $query_change) or die (mysqli_error($db_connection));

  */