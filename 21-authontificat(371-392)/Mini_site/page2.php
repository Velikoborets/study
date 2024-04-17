
<?php
    // Ошибочки:
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    mb_internal_encoding('UTF-8');
?>

<?php
// "подхватываем сессию" и ввыводим сообще для зареганых
// И предл. выйти
?>

<?php session_start(); ?>
<?php if (!empty($_SESSION['auth'])): ?>
<!DOCTYPE html>
<head>
</head>
    <body>
        <p>Добро пожаловать! <?=$_SESSION['login']; ?> </p>
        <p>Текст, для тех кто смог пройти регистрацию!) </p>
        <p><a href="4_logout.php">Выйти</a> из аккаунта </p>
    </body>
</html>
<?php else: ?>
    <p>Пожалуйста, авторизуйтесь! <a href="2_auth.php">ссылка</a> </p>
<?php endif; ?>

<?php //session_destroy(); ?>