
<?php

    // main.php
    // "подхватываем сессию" и ввыводим сообще для зареганых
    // И предл. выйти

?>
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
</html>