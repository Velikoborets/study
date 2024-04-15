
<?php

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

// 6. Если форма заполнена - то делаем дальнейшие проверки,
// иначе - выводим пустую форму.

?>

<?php session_start(); ?>

<?php if(!empty($_POST['login']) && !empty($_POST['password'])): ?>

    <?php if (!empty($user)): ?>

        <?php // Записываем в сессию: ?>

        <?php // Пометку для авторизованных ?>
        <?php $_SESSION['auth'] = true ?>

        <?php // Flash - сообщение ?>
        <?php $_SESSION['message'] = 'вы вышли из аккаунта! Авторизуйтесь'; ?>

        <?php // Логин юзера ?>
        <?php $_SESSION['login'] = $login; ?>

        <?='Спасибо, что автризовались! Можете ходить по страницам:'?><br>
        <a href="page1.php">page1</a><br>
        <a href="page2.php">page2</a>

    <? else: ?>

        <?='Проверьте ваши данные!'; ?>

    <?php endif; ?>

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


<?php
    // Киляем сессию, если надо:
    // session_destroy();
?>
