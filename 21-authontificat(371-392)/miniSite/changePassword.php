
<?php

session_start();

// Параметры подключения к БД
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="miniSite.css">
    <title>changePassword</title>
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
<h4>Хотите изменить пароль?</h4>
    <form action="" method="POST">
        <input name="oldPassword" type="password"
         value="<?=$_POST['oldPassword'] ?? ''?>"> Старый пароль <br>
        <input name="newPassword" type="password"> Новый пароль <br>
        <input name="confirmPassword" type="password"> Подтв. new пароль <br>
        <input name="submit" type="submit">
    </form>
</body>
</html>

<?php

if (!empty($_POST)) {

    $id = $_SESSION['id'];
    $query = "SELECT * FROM dataUsers WHERE id='$id'";
    $dbQuery = mysqli_query($dbConnect, $query) or die (mysqli_error($dbConnect));

    $user = mysqli_fetch_assoc($dbQuery);

    // Захэшированый пароль из БД
    $hash = $user['password'];

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];


    if (password_verify($oldPassword, $hash)) {

        if ($newPassword === $confirmPassword && strlen($newPassword) > 4 && $newPassword != '') {

            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            $queryUpdatePass = "UPDATE dataUsers SET password='$newPasswordHash' WHERE id='$id'";
            $dbQueryUpdatePass = mysqli_query($dbConnect, $queryUpdatePass);

            echo 'Пароль успешно изменен!';

            mysqli_close($dbConnect);

        }

        else {

            echo 'Новый пароль не совпадает с подтверждением!' . '<br>' .
            'Либо, Вы отправляйте - пустые поля!';

        }

    }

    else {

        echo 'Неправильный "старый" пароль!';

    }

}

?>

<?php // session_destroy(); ?>