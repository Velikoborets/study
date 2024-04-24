
<?php

session_start();

// Параметры подключения к БД
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!empty($_SESSION['auth']) && $_SESSION['status'] === 'admin') {

    $queryUsers = "SELECT dataUsers.*, statuses.status as status
        FROM dataUsers LEFT JOIN statuses
        ON dataUsers.status_id=statuses.id";

    $dbQueryUsers = mysqli_query($dbConnect,$queryUsers);

    $tableUsers = [];
    while ($users = mysqli_fetch_assoc($dbQueryUsers)) {

        $tableUsers[] = $users;

    }

}

else {

    echo 'Уходи, эта страница для админов!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="miniSite.css">
    <title> For Admins </title>
</head>
<body>
<h5>
    <?php if (!empty($_SESSION['auth'])): ?>
        <?='Ваш логин: '. $_SESSION['login'] . '<br>' .
        'Ваш статус: ' . $_SESSION['status']; ?>
    <?php endif; ?>
</h5>
<h4>Приветствую! Эта страница создана, для админов!</h4>
<h4>Вот все данные user: </h4>

    <table>

        <tr>
            <th>Login</th>
            <th>Status</th>
            <th>Delete account</th>
            <th>Change status</th>
        </tr>

        <?php foreach ($tableUsers as $user): ?>
        <tr class="<?=$user['status'] == 'admin' ? 'red' : 'green'; ?>">

            <td><?=$user['login'];?></td>
            <td><?=$user['status'];?></td>

            <!-- Удалить аккаунт по ссылке -->
            <td>
                <a href="deleteAccount.php?id=<?=$user['id']?>">
                    delete
                </a>
            </td>

            <!--  Изменение статуса по ссылке  -->
            <td>
                <a href="changeStatus.php?id=<?=$user['id']?>">
                    <?=$user['status']?>
                </a>
            </td>

        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>

<?php //session_destroy(); ?>