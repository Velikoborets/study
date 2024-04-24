
<?php

session_start();

// Параметры подключения к БД
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Найдём данные из БД user, который авторизовался по id из сессии
$id = $_SESSION['id'];
$query = "SELECT * FROM dataUsers WHERE id='$id'";
$dbQuery = mysqli_query($dbConnect, $query) or die (mysqli_error($dbConnect));

$user = mysqli_fetch_assoc($dbQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="miniSite.css">
    <title>Your Cabinet</title>
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
<?php if (!empty($_SESSION['auth'])): ?>
<h4>Редактирование данных user (Личный кабинет)</h4>
    <form action="" method="POST">
<?php // Достанем напр. из БД имя и фамилию user и введём в $_POST ?>
        <input name="firstName" type="text" value="<?=$user['firstName']?>"><br>
        <input name="lastName" type="text"
         value="<?=$user['lastName']?>"><br>
        <input name="submit" type="submit"><br>
        <a href="changePassword.php"> Хотите изменить пароль? </a> <br>
        <a href="deleteAccount.php"> Или удалить аккаунт? </a>
    </form>
<?php else: ?>
    <h5>Авторизируйтесь, чтобы войти в личный кабинет!</h5>
<?php endif; ?>
</body>
</html>

<?php

if (!empty($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    if ($firstName == $user['firstName'] && $lastName == $user['lastName']) {

        echo 'Если хотите, можете изменить данные';

    }

    else {

        // Когда изменили данные в $_POST, изменяем и в БД
        $queryUpdate = "UPDATE dataUsers SET firstName='$firstName', lastName='$lastName' WHERE id='$id'";

        $dbQueryUpdate = mysqli_query($dbConnect, $queryUpdate) or die (mysqli_error($dbConnect));

        mysqli_close($dbConnect);

        echo 'Ваши данные успешно изменены. Перезагрузите стр. чтобы увидеть изменения!';

    }

}

else {

    echo 'Если хотите, можете изменить данные';

}

?>

<?php //session_destroy(); ?>