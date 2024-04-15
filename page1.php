
<p> этот текст для всех </p>
<?php session_start(); ?>
<?php if (!empty($_SESSION['auth'])): ?>
    <p>А это сообщение для Вас <?=$_SESSION['login']; ?> </p>
    <p><a href="logout.php">Выйти</a> из аккаунта </p>
<?php else: ?>
    <?='Зарегайтесь! Чтобы увидеть скрытый текст'; ?><br>
    <p>Вот <a href="auth.php">ссылка</a> для авторизации</p>
<?php endif?>

<?php //session_destroy(); ?>