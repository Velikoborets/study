
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>page2</title>
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <p>Добро пожаловать! <?=$_SESSION['login']; ?> </p>
        <p>Текст, для тех кто смог пройти регистрацию!) </p>
        <p><a href="logout.php">Выйти</a> из аккаунта </p>
    <?php else: ?>
        <p>Пожалуйста, авторизуйтесь! <a href="auth.php">ссылка</a> </p>
    <?php endif; ?>
</body>
</html>

<?php
    // "подхватываем сессию" и ввыводим сообще для зареганых
    // И предл. выйти
?>

<?php //session_destroy(); ?>