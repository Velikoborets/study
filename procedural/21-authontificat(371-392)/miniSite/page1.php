
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>page1</title>
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
    <p> этот текст для всех </p>
        <?php if (!empty($_SESSION['auth'])): ?>
            <p>А это сообщение для Вас <?=$_SESSION['login']; ?> </p>
            <p><a href="logout.php">Выйти</a> из аккаунта </p>
        <?php else: ?>
            <?='Зарегайтесь! Чтобы увидеть скрытый текст'; ?> <br>
            <p>Вот <a href="auth.php">ссылка</a> для авторизации</p>
    <?php endif?>
</body>
</html>

<?php
    // Краткое объясненение стр:
    // "подхватываем сессию" и ввыводим сообще для зареганых
    // И предл. выйти
?>