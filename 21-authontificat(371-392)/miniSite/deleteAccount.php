
<?php

session_start();

const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>delete account</title>
    <link rel="stylesheet" href="miniSite.css">
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
    <h4>Удаление аккаунта</h4>
    <form action="" method="POST">
        <input name="confirmDelete" type="password">
        Введите свой пароль, чтобы подтвердить удаление <br>
        <input type="submit" value="удалить">
    </form>
</body>
</html>

<?php

// Удаление для "Админа"
if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    var_dump($_SESSION);

    $queryDeleteAcc = "DELETE FROM dataUsers WHERE id='$id'";
    $dbQueryDeleteAcc = mysqli_query($dbConnect, $queryDeleteAcc);

    $_SESSION['del'] = 'Аккаут удалён';
    header('Location: reg.php');
    die();

}

// Удаление для "Обычного юзера"
if (!empty($_POST)) {

    $password = $_POST['confirmDelete'];
    $id = $_SESSION['id'];

    $queryUser = "SELECT * FROM dataUsers WHERE id='$id'";
    $dbQueryCheckUser = mysqli_query($dbConnect, $queryUser);

    // pass bd
    $user = mysqli_fetch_assoc($dbQueryCheckUser);
    $passUser = $user['password'];

    if (password_verify($password, $passUser)) {

        $queryDeleteAcc = "DELETE FROM dataUsers WHERE id='$id'";
        $dbQueryDeleteAcc = mysqli_query($dbConnect, $queryDeleteAcc);

        $_SESSION['del'] = 'Аккаут удалён';
        header('Location: reg.php');
        die();

    }

    else {

        echo 'Не правильный пароль!';

    }

}

?>

<?php //session_destroy(); ?>
