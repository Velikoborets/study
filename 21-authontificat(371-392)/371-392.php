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

// Юзер и зарегистр. (Есть совпадение с БД)
    <?php if (!empty($user)): ?>

        <?php // Записываем в сессию: ?>

        <?php // Пометку для авторизованных ?>
        <?php $_SESSION['auth'] = true ?>

        <?php // Flash - сообщение ?>
        <?php $_SESSION['message'] = 'вы вышли из аккаунта! Авторизуйтесь'; ?>

        <?php // Логин юзера ?>
        <?php $_SESSION['login'] = $login; ?>

         // Выводим сообщ. об успехе и делаем редирект на стр main.php
        <?php header('Location: main.php'); ?>
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
        <link rel="stylesheet" href="miniSite.css">
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


// main.php

<body>
    <h2>ГЛАВНАЯ СТРАНИЦА</h2>
    <p>В этом месте контент, для всех пользователей</p>
    <?php session_start(); ?>
    <?php if (!empty($_SESSION['auth'])): ?>
        <p>Скрытй контент, для Вас <?=$_SESSION['login']; ?> : </p>
        <a href="page1.php">page1</a><br>
        <a href="page2.php">page2</a>
        <p>Хотите <a href="logout.php">выйти</a> из аккаунта?</p>
    <?php else: ?>
        <p>Если хотите видеть скрытый
        текст то <a href="auth.php"> Авторизуйтесь </a></p>
    <?php endif; ?>
</body>


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

//  А так же поставим помтеку, об успешной авторизации
//  (Чтобы user, авторизовывался автоматически);

            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            header('Location: main.php');
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
        <link rel="stylesheet" href="miniSite.css">
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
// И сделаем редирект, на стр. main.php
// Где у нас ссылки на др. страницы

// В пункте 7, урока 375 , допишем эту пометку:

// session_start();
// $_SESSION['auth'] = true;
// $_SESSION['login'] = $login;
// header('Location: main.php');
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

// Этот урок и все до него, подробно расписаны в папке mini_site
// (В комментах к коду)



/***** ХЕШИРОВАНИЕ ПАРОЛЯ НА PHP 381/392 ****/

// С пом. фу-ии  md5('текущий пароль') // выведет  827ccb0eea8a706c4c34a..
// Мы хэшируем пароль,чтобы если взломают, в БД пароля не было видно.

// Теперь в регистрации будем добавлять не пароль, а его хэш:
// $password = md5($_POST['password']);



/***** ДОБАВЛЕНИЕ СОЛИ В РЕГИСТРАЦИЮ 382/392 ****/

// Соль - это  случайная строка (у каждого юзера - своя),
// которая будет добавляться к паролю при регистрации
// и хеш уже будет вычисляться от строки "соль + пароль".
// (это делается, для усложнения паролей, чтобы хакеры не взломали).

// Фу-я, которая генерирует "соль":
/*
	function generateSalt() {
		$salt = '';
		$saltLength = 8; // длина соли

		for ($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
		}
		return $salt;
	}
*/

// Перепишем наш код, с учётом добавления "соли".
/*
    $salt = generateSalt();                         // соль
    $password = md5($salt . $_POST['password']);    // соленый пароль
*/

// т.е при РЕГИСТРАЦИИ в БД сохр. не просто хеш-пароля, а хеш соленого пароля
// А также создадим в таблице поле salt, в котором будем сохр. соль отдельно:



/***** ДОБАВЛЕНИЕ СОЛИ В АВТОРИЗАЦИЮ 383/392 ****/

// Чтобы добавить "соль" в авторизацию,
// Необходимо нашу проверку разделить на 2 части:

// 1-я часть:
// Проверяем логин на совпадение с БД,
    // И если логин совпал, то начинаем 2-ю часть
    // Иначе выведем сообщ "Логин не совпал!"

// 2-я часть:
// Начинаем проверку пароля.

// 1. Вытаскиваем "соль" из БД
// 2. Вытаскиваем "соленый пароль" из БД (Он захэширован)

// 3. Добавим к паролю от user (который он ввёл), соль из БД
// Чтобы сравнить с "соленым паролем из БД",
// И сразу захэшируем его:
// $password = md5($salt . $_POST['password']);

// 4. Теперь у нас 2 "соленых пароля", а также "захэшированных",
// Один от user, второй от БД, сравним их:
// Если эквивалентны, то:
    // Выполняем авторизацию, делаем редирект, записываем сообщ итд
// Иначе если отличаются
    // выводим сообщ  "Пароль не совпал!"

/* Для без-ти, надо писать "неправильный логин или пароль" */



/***** ФУНКЦИЯ PASSWORD_HASH 384/392 ****/

// md5() - явл. устаревшей фу-ей. Для "соления пароля".
// Сегодня нам не нужна фу-я "соли", отедельное поле в таблице с "солью" итд

// С пом. фу-ии password_hash();
// Мы создаём соленый пароль и сразу хэшируем его
// Ну и по стандартному сразу пишем в таблицу (это в регистрации);

// Теперь мы можем сократить, код РЕГИСТРАЦИИ до:
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// (В БД нужно исправить размер поля с паролем и установить его в 60 символов)

// И с пом. фу-ии password_verify(),
// Можем проверить ХЭШ из БД на соответствие паролю,
// Который ввёл user;

// И соотв. слегка подправим код, АВТОРИЗАЦИИ:
/*
    //  проверка на логин

        // соленый пароль из БД:
        $hash = $user['password'];

        // Проверяем соответствие хеша из БД, паролю который ввёл user:
        if (password_verify($_POST['password'], $hash)) {
            echo 'Пароль верный! начинаем авторизацию';
        } else {
            echo 'Проверьте пароль!';
        }
*/



/***** РЕАЛИЗАЦИЯ ПРОФИЛЯ НА PHP 385/392 ****/

// "профиль" - инфа, которую user, указал при регистрации.

// Сделаем стр. profile.php, в которую будем передавать id user,
// Которого мы хотим посмотреть.

// На profile.php, мы будем показывать, например:
// Имя, Фамилия, дата рождения;

// ДЗ (Реализация профиля):
// 1
// Пусть при регистрации мы спрашивали у пользователя логин, пароль, имя, отчество, фамилию, дату рождения. Выведите в профиле пользователя все эти данные, кроме пароля

// 2
// Модифицируйте предыдущую задачу так, чтобы вместо даты рождения показывался текущий возраст пользователя.

// 3
// Сделайте страницу users.php, зайдя на которую любой пользователь нашего сайта может увидеть список всех зарегистрированных пользователей нашего сайта в виде ссылок. Каждая ссылка будет вести на соответствующий профиль.



/***** ЛИЧНЫЙ КАБИНЕТ НА PHP 386/392 ****/

// Личный кабинет - где user, редактирует данные.
// Сделаем стр. account.php, зайдя на которую,
// user увидит форму для редактирования данных своего профиля:

// id - при авторизации, мы передаём с пом. сессии,
// чтобы юзер видел только свои данные.

// 1. При заходе с помощью id из сессии
//    (сделаем запрос, чтобы вытащить из БД юзера, который авторизовался).

// 2. Запишем данные из БД в input формы

// 3. Когда после отправки данные в $_POST изменились
//    То меняем данные и в БД и выводим сообщения об этом.
//    Когда данные не изменены, то говорим, что можем их поменять.



/***** СМЕНА ПАРОЛЯ + ПОДТВЕРЖДЕНИЕ ПАРОЛЯ НА PHP 387/388/ 392 ****/

// Для без-ти, сделал так, чтобы смена пароля,
// Требовала ввода стаорого пароля.



/***** УДАЛЕНИЕ АККАУНТА НА PHP 389/392 ****/

// Реализовано самостоятельно)



/***** ПРАВА ДОСТУПА НА PHP 390/392 ****/

// В БД напр. уже записан (при регистрации) статус в отдельный столбец.
// Если статус "admin" - права одни, (напр. расширенные),
// Если статус "user" - то права менее расширенные.

// auth.php
// при авторизации в сессию записываем статус, который соотв. БД
// $_SESSION['status'] === $user['admin'];

// main.php
// теперь на стр, будет показываться инфа, которая для админов (через сессию)
// $_SESSION['status'] === 'admin';  //



/***** РЕГИСТРАЦИЯ С РАЗДЕЛЕНИЕМ ПРАВ НА PHP 391/392 ****/

// Теперь при РЕГИСТРАЦИИ, нам необходимо, заносить статус в БД.
// INSERT INTO status = 'user'; (всем юзерам заносим "user")
// А админский статус ставим через PMA, или хостинг.
// Чтобы при АВТОРИЗАЦИИ, он уже был заранее определен.



/***** НОРМАЛИЗАЦИЯ БАЗЫ ДАННЫХ 392/392 ****/

