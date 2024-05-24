
<?php

session_start();

const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$query = "SELECT * FROM dataUsers";
$dbQuery = mysqli_query($dbConnect, $query) or die (mysqli_error($dbConnect));

$dataUsers = [];
while ($user = mysqli_fetch_assoc($dbQuery)) {

    $dataUsers[] = $user;

}

mysqli_close($dbConnect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
    <h4>Список всех users: </h4>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?php foreach ($dataUsers as $user): ?>
            <a href="profile.php?id=<?=$user['id']; ?>">
                <?=$user['login']; ?>
            </a><br>
        <?php endforeach; ?>
    <?php else: ?>
        <?='авторизуйтесь!' ?>
<? endif; ?>
</body>
</html>