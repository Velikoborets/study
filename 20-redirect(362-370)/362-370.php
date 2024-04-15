<?php

/*** ВВЕДЕНИЕ В РЕДИРЕКТЫ PHP 362/370 ***/  

// С пом. header() можем сделать переадресацию
// С одной страницы на другую:
/*
	$readdress = 'show.php';
	header("Location: $readdress"); 
*/
// Теперь каждый раз, мы будем заходить на page2.php
// Мы будем попадать на show.php



/*** МГНОВЕННЫЕ РЕДИРЕКТ В PHP 363/370 ***/  

// Редирект, с пом. фу-ии header(), не вып. мнгновенно
// Он происходит, тогда, когда отработал РНР код.
/*
	if ($_GET['test']) {
		header('Location: test.php'); // 2. Потом редирект
	}

	$query = "SELECT * FROM users"; 
	mysqli_query($link, $query);      // 1. Выполнится запрос
*/

// Чтобы это пофиксить:
// Сразу после redierct, завершаем работу скрипта:
// header('Location: test.php');
// die();



/*** GET ЗАПРОСЫ И РЕДИРЕКТ В PHP 364/370 ***/ 

// При redirect, можно также, передавать GET-параметры:
// header('Location: show.php?value=ivan');

// ДЗ (GET-запросы и редирект в РНР):
// 1
// На стр. передаём параметр "ivan" со знач "cool"
// Сделайте так, чтобы при наличии имени "ivan"
// и значения "cool", на стр. был вывод, что "всё ок".

/*** page2.php ***/
// Делаем редирект на show.php
// $header_redirect = header('Location: show.php?ivan=cool');
// die();

/*** show.php ***/
// Проверяем на нужное знач и GET-параметр:
/*
	if ($_GET['ivan'] == 'cool') {
	    echo 'успех! значение get-параметра равно = кулл!!';
	} else {
	    echo 'не успех :(( значение get-параметра не равно кулл(';
	}
*/



/*** САМОРЕДИРЕКТ С ДОБАВЛЕНИЕМ ПАРАМЕТРОВ В PHP 365/370 ***/

// Пусть на page2.php, передаётся GET-пар-р, с им. "num"
// И стр. без него не может работать корректно:
// $_GET['num'] = 11; // Undefined array key "av"

// И юзер при изменении адр.строки, может ее стереть итд
// Поэтому нам надо сделать редирект на ту же стр.
// Даже если параметров, нет или они изменены:
/*
	if (!isset($_GET['num'])) {
		header('Location: ?num = 11');
	}
*/
// echo $_GET['num']; // параметр 11 - всегда будет.



/*** ФЛЕШ СООБЩЕНИЯ В PHP 366/370 ***/

// *** page2.php ***

// Иногда, при редиректе, надо передать инфу
// (это наз. флеш-сообщения)
// Они так наз. т.к показ. 1 раз, а потом удаляются:

/*
	// стартуем сессию и записываем в нее сообщ. :
	session_start(); 
	$_SESSION['flash'] = 'message 1 repeat';

	// делаем редирект (если надо):
	header('Location: show.php');
	die();
*/


// *** show.php ***

/*  // подрубаемся к сессии:
	session_start();

	// вытаскиваем и удаляем флеш-сообщ:
	if (isset($_SESSION['flash'])) {
	    echo $_SESSION['flash'];
	    unset($_SESSION['flash']);
	}
*/



/*** МАССИВ ФЛЕШ СООБЩЕНИЙ В PHP 367/370 ***/

// Когда нужно показывать неск-ко флеш-сообщений, 
// То делаем их массив:

// * Чтобы запустить сессию на др стр. надо их открыть! *

// page2.php
// откр. файл. запуск. сессию. Записываем сообщ. :
// session_start ();
// $_SESSION['flash'] = 'message 1';

// show.php
// откр. файл. запуск. сессию Записываем сообщ. :
// session_start ();
// $_SESSION['flash'] = 'message 2';

// message.php
// откр. файл. проверка $_SESSION['flash'], 
// перебираем, выводим знач. И сразу присв. пуст. arr:
/* if (isset($_SESSION['flash'])) {
	foreach ($_SESSION['flash'] as $value) {
		echo $value;
	}

	$_SESSION['flash'] = [];
} */



/*** ОТПРАВКА ФОРМЫ В БД И РЕДИРЕКТ В PHP 368/370 ***/

/* Если мы будем сохранять данные БД в форму,
Не делая Редирект, то при каждом обновлении стр,
Данные будут дублироваться в БД:

// 1. Есть форма:
<form>
   <input type="text" name="test1">
   <input type="text" name="test2">
   <input type="submit">
</form>

// 2. сохр. данные формы посл. отправки:
 if (!empty($_POST)) {

// $db_query, $db_connect итд - (Тут сохр. в Базу):

// 3. Делаем редирект, на эту же стр,
// Для избегания дублирования:
    header('Location: page2.php');
    die();
 }
*/



/*** СООБЩЕНИЯ ОБ УСПЕХЕ ПРИ ОТПРАВКЕ ФОРМЫ В PHP 369/370 ***/

// Добав. после редиректа на стр. вывод. сообщ. об успехе:
// (Сделаем это с помощью flash - сообщений). 

/* 1. Есть форма:
<form>
<input type="text" name="test1">
<input type="text" name="test2">
<input type="submit">
</form>


// 2. сохр. данные формы посл. отправки:
 if (!empty($_POST)) {

// $db_query, $db_connect итд - (Тут сохр. данные. в БД):

// 3. Созд. флеш-сообщения
// $_SESSIONP['flash'] = 'форма успешно сохранена!';

// 4. Делаем редирект на эту же стр,
// 	  для избегания дублирования:
    header('Location: page2.php');
    die();
 }

// 5. Пров. и выводим флеш-сообщ:
if (isset($_SESSION['flash'])) {
	echo $_SESSION['flash'];
	unset($_SESSION['flash']);
}
*/ 



/*** РЕДИРЕКТ ПРИ ВАЛИДАЦИЯ ФОРМЫ В PHP 370/370 ***/

// ДЗ 
// 370
// Валидация - проверка на корректность заполнения формы.
// Если проверка формы, ок, то выведи флеш-сообщение, что ок
// Если нет - то выведи сообщение, что нет.
// Если поля заполнены - то заполни их!
// Когда заполнил поля, с помощью кук сохрани их значения!

/*  <!DOCTYPE html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="page2.php" method="post">
            <input name="name" type="text" value="
<?=$_COOKIE['str'] ?? 'noth'?>">Имя<br>
            <input name="age" type="text">Возраст<br>
            <input name="salary" type="text">Зарплата<br>
            <input type="submit">
        </form>
    </body>
</html>


<?php
    var_dump($_POST);
    
    // Для флеш-сообщений:
    session_start();

    // Когда форма отправлена выполняем манипуляции:
    if (!empty($_POST)) {

    // Устанавливаем куку, чтобы сохранить значение формы:
    setcookie('str', $_POST['name']);
    $_COOKIE['str'] = $_POST['name'];
    
    // Если "валидация" пройдена, то выполняем код:
        if (strlen($_POST['name']) > 3) {
            
            $name = $_POST['name'];
            $age = $_POST['age'];
            $salary = $_POST['salary'];

    // Подкл. к БД:
            $host = 'localhost';
            $name_for_enter = 'root';
            $pass = 'Gtahzby7711';
            $db_name = 'test_db';

            $db_connection = mysqli_connect($host,                             $name_for_enter, $pass, $db_name);

    // Заносим данные в БД
            $query_insert = "INSERT INTO users (name, "
            . "age, salary) VALUES ('$name',$age, $salary)";

            $db_query_insert = mysqli_query($db_connection,                    $query_insert) or die (mysqli_error($db_connection));
        
    // Флеш-сообщения об успешной отправке формы:    
            $_SESSION['flash'] = 'форма успешно отпр. и '
            . 'занесена в БД';         

    // Чтобы не допустить повторной отправки, надо обновить стр:
            header('Location: page2.php');
            die();

        } else {
            echo 'Проверьте имя (';
        }
    }
    
    if (isset($_SESSION['flash'])) {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }
?>
