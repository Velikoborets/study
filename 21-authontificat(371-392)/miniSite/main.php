
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
<header>
    <h5>
        <?php if (!empty($_SESSION['auth'])): ?>
            <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
            'Ваш статус: ' . $_SESSION['status']; ?>
        <?php endif; ?>
    </h5>
</header>
<h2>ГЛАВНАЯ СТРАНИЦА</h2>
    <p>В этом месте контент, для всех пользователей</p>
    <?php if (!empty($_SESSION['auth'])): ?>
        <p>Скрытй контент, для Вас <?=$_SESSION['login']; ?> : </p>
        <a href="page1.php">page1</a> <br>
        <a href="page2.php">page2</a> <br>
    <?php if ($_SESSION['status'] == 'admin'): ?>
        <a href="admin.php"> Страница для администраторов </a> <br>
    <?php endif; ?>
        <a href="users.php">Список зареганых users</a> <br>
        <a href="account.php">Личный кабинет</a>
        <p>Хотите <a href="logout.php">выйти</a> из аккаунта?</p>
    <?php else: ?>
        <p>Если хотите видеть скрытый
        текст то <a href="auth.php"> Авторизуйтесь </a></p>
    <?php endif; ?>
</body>
</html>

<?php // session_destroy(); ?>

<?php
    // Краткое пояснение к main.php
    // "подхватываем сессию" и ввыводим сообще для зареганых
    // И предл. выйти
?>