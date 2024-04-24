
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<h5>
<?php if (!empty($_SESSION['auth'])): ?>
    <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
    'Ваш статус: ' . $_SESSION['status']; ?>
<?php endif; ?>
</h5>
<?php

const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$id = $_GET['id'];

// Соберем данные из БД:
$query = "SELECT * FROM dataUsers WHERE id='$id'";
$dbQuery = mysqli_query($dbConnect, $query);

// Переберем эти данные в виде массива:
$dataUsers = [];
while ($user = mysqli_fetch_assoc($dbQuery)) {

    $dataUsers[] = $user;

}

mysqli_close($dbConnect);

?>

<?php if (!empty($_SESSION['auth'])): ?>
    <?php foreach ($dataUsers as $current_user): ?>
        <?php if (!empty($id)): ?>
            <h4>Личная страничка -  <?=$current_user['login']?> </h4>
            <h5>Его имя: <?=$current_user['firstName']?> </h5>
            <h5>Фамилия: <?=$current_user['lastName']?> </h5>
            <h5>Отчество: <?=$current_user['fatherName']?> </h5>
            <h5>Возраст: <?=$current_user['dateDiff']?> </h5>
        <?php endif; ?>
    </body>
    </html>
    <?php endforeach; ?>
<?php endif; ?>