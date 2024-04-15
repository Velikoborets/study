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
// заходит на страницу auth.php, вбивает правильные логин и пароль
// далее "ходит" по страницам сайта уже будучи авторизованным.

/* auth.php
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

// auth.php

/* тут у нас код из урока 372, где проверка на совпадение
   вводимых данных user с данными из БД.

<?php session_start(); ?>

// Если отправлены логин и пароль:
<?php if(!empty($_POST['login']) && !empty($_POST['password'])): ?>

// Юзер и зарегестр. (Есть совпадение с БД)
    <?php if (!empty($user)): ?>

        <?php // Записываем в сессию: ?>

        <?php // Пометку для авторизованных ?>
        <?php $_SESSION['auth'] = true ?>

        <?php // Flash - сообщение ?>
        <?php $_SESSION['message'] = 'вы вышли из аккаунта! Авторизуйтесь'; ?>

        <?php // Логин юзера ?>
        <?php $_SESSION['login'] = $login; ?>

         // Выводим сообщ. об успехе с ссылками для др.стр.
        <?='Спасибо, что автризовались! Можете ходить по страницам:'?><br>
        <a href="page1.php">page1</a><br>
        <a href="page2.php">page2</a>

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
        <link rel="stylesheet" href="base_css.css">
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


// page1.php

<p> этот текст для всех </p>
<?php session_start(); ?>

// сообщение для зареганых юзеров:
<?php if (!empty($_SESSION['auth'])): ?>
    <p>А это сообщение для Вас <?=$_SESSION['login']; ?> </p>
// предложение о выходе из аккаунта
    <p><a href="logout.php">Выйти</a> из аккаунта </p>

// текст для тех, кто не зареган:
<?php else: ?>
    <?='Зарегайтесь! Чтобы увидеть скрытый текст'; ?><br>
    <p>Вот <a href="auth.php">ссылка</a> для авторизации</p>
<?php endif?>


// logout.php

// когда в page1.php тыкаем на ссылку "выйти из аккаунта",
// мы переходим на logout.php, где снимаем пометку об авторизации,
// и переходим обратно на стартовую стр, с авторизацией:

session_start();
$_SESSION['auth'] = false;
header('Location: auth.php');
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
            echo 'Ваши данные приняты!';
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
        <link rel="stylesheet" href="base_css.css">
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



