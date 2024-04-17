<?php

/******* ВВЕДЕНИЕ В АУТЕНТИФИКАЦИЮ НА PHP 371/392 ******/

// Аутентификация - процесс определения usr сайтом (вход на сайт).
// Перед этим user, должен зарегаться.
// Корое будем изучать Авторизацию и Регистрацию



/***** ПРОСТАЯ АВТОРИЗАЦИЯ ЧЕРЕЗ БАЗУ ДАННЫХ НА PHP 372/392 ****/
/*
// 1. Предположим, что регистрация уже пройдена и юзеры записаны в БД.

// 2. Запишем данные из формы в переменную:
$login = $_POST['login'];
$password = $_POST['password'];

// 3. Теперь подключимся к нашей БД:
$host = 'localhost';
$name = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connect = mysqli_connect($host, $name, $pass, $db_name);

// 4. Запрос к БД, для проверки данных на совпадение
// (мы авторизуем user, поэтому данные уже есть!):
$query_check = "SELECT * FROM data_of_users WHERE login='$login' AND password='$password'";

$db_query_check = mysqli_query($db_connect, $query_check);

// 5. Запишем результат запроса в $user:
$user = mysqli_fetch_assoc($db_query_check);

?>

 // 6. Когда форма отправлена
<?php if(!empty($_POST)): ?>

// 7. Если юзер не совпадает в проверкее БД
    <?php if (empty($user)): ?>

        <?='Проверьте ваши данные!'; ?>

// 8. Если юзер с БД совпадает, выведем флеш сообщение:
    <? else: ?>

        <?php session_start(); ?>
        <?php $_SESSION['message']='Success!!'?>
        <?php header('Location: page2.php'); ?>
        <?php die(); ?>

    <?php endif; ?>

// 9. Если форма не отпр. выводим пустую:
<? else: ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorization</title>
</head>
<body>
<h4>Авторизация</h4>
<form action="" method="POST">
    <input name="login" type="text">Логин<br>
    <input name="password" type="password">Пароль<br>
    <input type="submit">
</form>
</body>
</html>
<?php endif; ?> */



/***** АВТОРИЗАЦИЯ ЧЕРЕЗ СЕССИЮ НА PHP 373/392 ****/

// Наша авторизация должна работать так:
// пользователь, который хочет авторизоваться на сайте,
// заходит на страницу 2_auth.php, вбивает правильные логин и пароль
// далее "ходит" по страницам сайта уже будучи авторизованным.

/* 2_auth.php
   После того, как проверка на совпад. user пройдена ()
   допишем пометку для др стр : $_SESSION['auth'] = true
   которая означ. что user, авторизован.

    <?php  if (!empty($user)): ?>
        <?php session_start(); ?>
        <?php  $_SESSION['auth'] = true ?>


// page2.php
   Тут стартанём сессию. И если сущ. $_SESSION['auth']
   То напишем "скрытый текст для user". Например:

   <?php

       if (!empty($_SESSION['auth'])) {
          echo 'текст только для авт. пользователя';
      } else {
          echo 'вы не зареганы((';   // можно и без этого текста
      }

    Можно и так записать (закрыть часть стр.):

    <p>текст для всех</p>
    <?php
        if (!empty($_SESSION['auth'])) {
            echo 'текст только для авт. пользователя';
        }
    ?>
    <p>текст для всех</p>
*/



/***** ВЫХОД ИЗ СЕССИИ НА PHP 374/392 ****/

// ДЗ (выход из сессии):

// 2_auth.php

/* тут у нас код из урока 372, где проверка на совпадение
   вводимых данных user с данными из БД.

<?php session_start(); ?>

// Если отправлены логин и пароль:
<?php if(!empty($_POST['login']) && !empty($_POST['password'])): ?>

// Юзер и зарегистр. (Есть совпадение с БД)
    <?php if (!empty($user)): ?>

        <?php // Записываем в сессию: ?>

        <?php // Пометку для авторизованных ?>
        <?php $_SESSION['auth'] = true ?>

        <?php // Flash - сообщение ?>
        <?php $_SESSION['message'] = 'вы вышли из аккаунта! Авторизуйтесь'; ?>

        <?php // Логин юзера ?>
        <?php $_SESSION['login'] = $login; ?>

         // Выводим сообщ. об успехе и делаем редирект на стр 3_main.php
        <?php header('Location: 3_main.php'); ?>
        <?php die(); ?>

    <? else: ?>
        // Если юзер не совпадает
        <?='Проверьте ваши данные!'; ?>
    <?php endif; ?>

 // Если форма не отправлена выведи пустую:
<? else: ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Authorization</title>
        <link rel="stylesheet" href="mini_site.css">
    </head>
    <body>
    <h4>Авторизация</h4>
    <form action="" method="POST">
        <input name="login" type="text">Логин<br>
        <input name="password" type="password">Пароль<br>
        <input type="submit">
    </form>
    </body>
    </html>

    <?=$_SESSION['message']; ?>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>


// 3_main.php

<body>
    <h2>ГЛАВНАЯ СТРАНИЦА</h2>
    <p>В этом месте контент, для всех пользователей</p>
    <?php session_start(); ?>
    <?php if (!empty($_SESSION['auth'])): ?>
        <p>Скрытй контент, для Вас <?=$_SESSION['login']; ?> : </p>
        <a href="page1.php">page1</a><br>
        <a href="page2.php">page2</a>
        <p>Хотите <a href="4_logout.php">выйти</a> из аккаунта?</p>
    <?php else: ?>
        <p>Если хотите видеть скрытый
        текст то <a href="2_auth.php"> Авторизуйтесь </a></p>
    <?php endif; ?>
</body>


// 4_logout.php

// когда в page1.php тыкаем на ссылку "выйти из аккаунта",
// мы переходим на 4_logout.php, где снимаем пометку об авторизации,
// и переходим обратно на стартовую стр, с авторизацией:

session_start();
$_SESSION['auth'] = false;
header('Location: 2_auth.php');
die();
*/



/***** РЕГИСТРАЦИЯ НА PHP 375/392 ****/
/*
// 1. Запишем данные из формы в переменную:
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$date = $_POST['date'];
$current_date = date('d-m-Y');

// 2. Теперь подключимся к нашей БД:
$host = 'localhost';
$name = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connect = mysqli_connect($host, $name, $pass, $db_name);

// 3. Если форма отправлена
if (!empty($_POST)):

// 4. Регулярное выражение, для проверки email на корректность:
    $reg = '#[a-zA-Z0-9\-_]+@[a-z]+\.[a-z]{2,}#';
    $check_email = preg_replace($reg, 'success', $email);

// 5. Chrome записывает дату в формате (y-d-m). Преобр. дату в формат (d-m-y):
    $arr = explode('-', $date);
    list($year, $month, $day) = $arr;
    $correct_date = $day . '-' . $month . '-' . $year;

// 6. При заполненых полях: имени, пароля, даты, email
//    Проверим их на корректность:
    if (!empty($login) && !empty($password)
        && !empty($email) && !empty($date)) {

        if (strlen($login) <= 3) {
            echo 'Cлишком короткий логин';
        } elseif (strlen($password) < 5) {
            echo 'Cлишком короткий пароль';
        } elseif ($check_email != 'success') {
            echo 'Проверьте email';
        } else {

// 7. Когда форма прошла все проверки, зарегаем нашего юзера.
//    Вставив все его данные в БД.
//    (Помимо этого, автоматически вставим дату его регистрации):

            $query_insert = "INSERT INTO data_of_users SET login='$login',password='$password', email='$email', birthday='$correct_date',date_of_reg='$current_date'";
            $db_query_insert = mysqli_query($db_connect, $query_insert);

//  А так же поставим помтеку, об успешной авторизации
//  (Чтобы user, авторизовывался автоматически);

            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            header('Location: 3_main.php');
            die();
        }

// 8. Если поля пустые то соотв:
    } else {
        echo 'Заполните поля!!';
    }

// 9. Если форма не отправлена, то выводим пустую форму: ?>
<?php else: ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="mini_site.css">
    </head>
    <body>
    <h4>Регистрация</h4>
    <form action="" method="POST">
        <input name="login" type="text"> Create Логин <br>
        <input name="password" type="password">Create Пароль <br>
        <input name="email" type="email"> Email <br>
        <input name="date" type="date"> Дата рождения <br>
        <input type="submit">
    </form>
    </body>
    </html>
<?php endif; ?>
*/



/***** АВТОРИЗАЦИЯ СРАЗУ ПРИ РЕГИСТРАЦИИ В PHP 376/392 ****/

// Чтобы зайти на сайт сразу, после успешной регистрации,
// запишем в сессию "пометку", об успешной авторизации;
// И сделаем редирект, на стр. 3_main.php
// Где у нас ссылки на др. страницы

// В пункте 7, урока 375 , допишем эту пометку:

// session_start();
// $_SESSION['auth'] = true;
// $_SESSION['login'] = $login;
// header('Location: 3_main.php');
// die();



/***** ДОБАВЛЕНИЕ ID ПОЛЬЗОВАТЕЛЯ В СЕССИЮ 377/392 ****/

// Если нам надо добавить ID user в сессию (при регистрации),
// исп. фу-ю :              $id = mysqli_insert_id($link);
// И запишем id в сессию:   $_SESSION['id'] = $id;

// Допишем в том же месте, как и прошл. задании
// (В пункте 7, урока 375);



/***** СКРЫТИЕ ПАРОЛЯ ПРИ РЕГИСТРАЦИИ НА PHP 378/392 ****/

// Скрытие пароля делается с пом. input type=password
// Но тут проблема - что user, не видит, то что вводит и может ошибиться.
// И зарегаться с др. паролем (т.к поле одно!)

// Для решения такой проблемы, создаём 2 поля с type=password
// В одном вводим пароль, во втором его подтверждение
// Напишем проверку, которая проверяет пароли на совпадение:

/*
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!empty($password) && !empty($confirm_password)) {

        if ($password === $confirm_password) {
            echo 'Отлично, пароли совпадают. Ваш пароль создан!';
        } else {
            echo 'Пароли не совпадают((';
        }
    }
*/
// Ну и поместим ее в регистрацию (Это ДЗ, я его сделал)



/***** ПРОВЕРКА ЛОГИНА НА ЗАНЯТОСТЬ 379/392 ****/

// Внедрили в регистрацию условие для проверки логина на уникальность.
// 4. Запрос, для проверки логина на уникальность:
/*
    $query_check_login = "SELECT * FROM data_of_users WHERE login='$login'";
    $db_query_check_login = mysqli_query($db_connect, $query_check_login);
    $check_login= mysqli_fetch_assoc($db_query_check_login);
*/



/***** ВАЛИДАЦИЯ ДАННЫХ ПРИ РЕГИСТРАЦИИ НА PHP 380/392 ****/

// Валидация - проверка формы на "правильность заполнения".
// т.к там много "нюансов, то потом скину уже всё готовое и закомментирую как надо для всех уроков"

