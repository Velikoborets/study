
<?php

session_start();

echo '<h5>';
if (!empty($_SESSION['auth'])){

    echo 'Ваш логин: '. $_SESSION['login'] . '<br>' ;
    echo 'Ваш статус: ' . $_SESSION['status'];

}
echo '<h5>';

// Параметры подключения к БД
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!empty($_SESSION['auth']) && $_SESSION['status'] === 'admin') {

    $queryUsers = "SELECT * FROM dataUsers";
    $dbQueryUsers = mysqli_query($dbConnect,$queryUsers);

    $tableUsers = [];
    while ($users = mysqli_fetch_assoc($dbQueryUsers)) {

        $tableUsers[] = $users;

    }

}

else {

    echo 'Уходи, эта страница для админов!';

}

$id = $_GET['id'];

foreach ($tableUsers as $user) {

    if ($user['id'] === $id) {

        if ($user['status'] == '1') {

            $changeStatus = "UPDATE dataUsers SET status='2' WHERE id='$id'";
            $dbQueryChange = mysqli_query($dbConnect, $changeStatus) or die (mysqli_error($dbConnect));

            header('Location: admin.php');
            die();

        }

        if ($user['status'] == '2')  {

            $changeStatus = "UPDATE dataUsers SET status='1' WHERE id='$id'";
            $dbQueryChange = mysqli_query($dbConnect, $changeStatus) or die (mysqli_error($dbConnect));

            header('Location: admin.php');
            die();

        }

    }

    else {

        echo $user['id'] . ' не совпадает!';

   }

}

?>