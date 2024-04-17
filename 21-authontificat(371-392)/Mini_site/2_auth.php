<?php

// Предположим, что регистрация уже пройдена и юзеры записаны в БД.

// Запишем данные из формы в переменную:
$login = $_POST['login'];
$password = $_POST['password'];

// Теперь подключимся к нашей БД:
$host = 'localhost';
$name = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connect = mysqli_connect($host, $name, $pass, $db_name);

// Запрос к БД, для проверки данных на совпадение
$query_check = "SELECT * FROM data_of_users WHERE login='$login' AND password='$password'";

$db_query_check = mysqli_query($db_connect, $query_check);

// Запишем результат запроса (на совпадение) в $user:
$user = mysqli_fetch_assoc($db_query_check);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Authorization</title>
    <link rel="stylesheet" href="mini_site.css">
</head>
<body>
<h4>Авторизация</h4>
<form action="" method="POST">

<?php
// Когда зашли на стр 1й раз:

    // Если поля заполнены продолжаем :
        // Если данные совпали, записываем в сессию:
            // Пометку об авт, флеш сообщ(что вышли из ак.) итд.
            // И делаем редирект на main.php
        // Иначе - выводим сообщение: Проверьте данные!
    // Иначе - ничего не выводим

// Когда зашли на стр После "выхода из акаунта":

    // Т.К мы уже были авторизованы (в сессию записано флеш-сообщение)
    // И поля еще не заполнены, то выводим флеш-сообщение:
    // "Вы вышли из аккаунта! авторизуйтесь!"
?>

<?php session_start(); ?>
<?php if(!empty($login) || !empty($password)): ?>
    <?php if (!empty($user)): ?>
        <?php // Записываем в сессию: ?>
        <?php // Пометку для авторизованных ?>
        <?php $_SESSION['auth'] = true ?>
        <?php // Flash - сообщение ?>
        <?php $_SESSION['message'] = 'Вы вышли из аккаунта! Авторизуйтесь'; ?>
        <?php // Логин юзера ?>
        <?php $_SESSION['login'] = $login; ?>
        <?php // И делаем редирект на 3_main.php ?>
        <?php header('Location: 3_main.php'); ?>
        <?php die(); ?>
    <? else: ?>
        <h6>Проверьте Логин или Пароль!</h6>
    <?php endif; ?>
<? else: ?>
    <h6><?=$_SESSION['message']; ?><h5>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
<input name="login" type="text" value="
<?php if(!empty($login)) echo $login ?>">Логин<br>
<input name="password" type="password">Пароль<br>
<input type="submit">
</form>
</body>
</html>