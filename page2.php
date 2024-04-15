
<?php
    // Ошибочки:
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    mb_internal_encoding('UTF-8');
?>


<?php session_start(); ?>
<?php if (!empty($_SESSION['auth'])): ?>
<!DOCTYPE html>
<head>
</head>
    <body>
        <p>Добро пожаловать! <?=$_SESSION['login']; ?> </p>
        <p>Текст, для тех кто смог пройти регистрацию!) </p>
        <p><a href="logout.php">Выйти</a> из аккаунта </p>
    </body>
</html>
<?php else: ?>
    <p>Пожалуйста, авторизуйтесь! <a href="auth.php">ссылка</a> </p>
<?php endif; ?>

<?php //session_destroy(); ?>