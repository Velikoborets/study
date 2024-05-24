
<?php

// Предположим, что регистрация уже пройдена и юзеры записаны в БД.
session_start();

// Получаем данные из POST
$login = $_POST['login'];
$password = $_POST['password'];

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
    <title>Authorization</title>
    <link rel="stylesheet" href="miniSite.css">
</head>
<body>
    <h4>Авторизация</h4>
    <form action="" method="POST">
<?php

if (!empty($login) || !empty($password)) {

    // Запрос к БД, для проверки логина на совпадение:
    $queryCheck = "SELECT dataUsers.*, statuses.status as status
        FROM dataUsers LEFT JOIN statuses
        ON dataUsers.status_id=statuses.id WHERE login='$login'";
    $dbQueryCheck = mysqli_query($dbConnect, $queryCheck) or die (mysqli_error($dbQueryCheck));

    // Запишем результат запроса (на совпадение логина) в $user:
    $user = mysqli_fetch_assoc($dbQueryCheck);
    var_dump($user);

    //mysqli_close($dbConnect);

    if (!empty($user)) {

        // Вытаскиваем захэшированый пароль из БД:
        $hash = $user['password'];

        // Проверим, соотв. ли пароль user захэшир-ному паролю из БД:
        if (password_verify($_POST['password'], $hash)) {

            $_SESSION['auth'] = true;
            $_SESSION['message'] = 'Вы вышли из аккаунта! Авторизуйтесь';
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user['id'];

            // Статус user, админ или обычный (а так же его изменение)
            $_SESSION['status'] = $user['status'];

            header('Location: main.php');
            die();

        }

        else {

           echo '<h6>Проверьте Пароль!</h6>';

        }

    }

    else {

        echo '<h6>Проверьте Логин </h6>';

    }

}

else {

        echo '<h6>' . $_SESSION['message'] . '</h6>';
        unset($_SESSION['message']);

}

 ?>

<input name="login" type="text" value="
<?php if(!empty($login)) echo $login ?>">Логин<br>
<input name="password" type="password">Пароль<br>
<input type="submit">
</form>
</body>
</html>

<?php  //session_destroy(); ?>


<?php
    // Краткое пояснение к авторизации:

    // Когда зашли на стр 1й раз:

    // Если поля заполнены продолжаем :
    // Если данные совпали, записываем в сессию:
    // Пометку об авт, флеш сообщ(что вышли из ак.) итд.
    // И делаем редирект на main.php
    // Иначе - выводим сообщение: Проверьте данные!
    // Иначе - ничего не выводим (флеш-сообщение, но об этом ниже).

    // Когда зашли на стр После "выхода из акаунта":

    // Т.К мы уже были авторизованы (в сессию записано флеш-сообщение)
    // И поля еще не заполнены, то выводим флеш-сообщение:
    // "Вы вышли из аккаунта! авторизуйтесь!"
?>