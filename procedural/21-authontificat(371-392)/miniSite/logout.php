
<?php
    session_start();
    $_SESSION['auth'] = false;
    header('Location: auth.php');
    die();
?>

<?php
    // При нажатии на "выйти" - попадатаем на logout.php
    // где тоже "подкл.сессию" и офаем отметку об авторизации
    // (чтобы еще раз не зайти на main.php) И делаем редирект на auth.php
?>