
<?php

session_start();

// При возвращении на страницу после автоматической авторизации
// Удаляем все данные сессии для нового начала
if ($_SESSION['auth'] === true) {

    session_destroy();

}

// Сообщение об удалении аккаунта
if (isset($_SESSION['del'])) {

    echo $_SESSION['del'];
    unset($_SESSION['del']);

}

// Получаем данные из POST
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$date = $_POST['date'];
$confirmPassword = $_POST['confirmPassword'];
$currentDate = date('d-m-Y');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$fatherName = $_POST['fatherName'];

// Параметры подключения к БД
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'Gtahzby7711';
const DB_NAME = 'testDb';

$dbConnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Проверка логина на кирилицу
$kirilPattern = '#[а-яА-Я]+#u';
$loginCheck = preg_replace($kirilPattern, 'kiril', $login);
$nameCheck = preg_replace($kirilPattern, 'kiril', $firstName);

// Проверка логина на существование в БД
$queryCheckLogin = "SELECT * FROM dataUsers WHERE login='$login'";
$dbQueryCheckLogin = mysqli_query($dbConnect, $queryCheckLogin)
or die (mysqli_error($dbConnect));
$checkLogin = mysqli_fetch_assoc($dbQueryCheckLogin);

// Проверка email на корректность
$emailPattern = '/[a-zA-Z0-9\-_]+@[a-z]+\.[a-z]{2,}/';
$emailCheck = preg_replace($emailPattern, 'error', $email);

// Преобразование даты из формата y-d-m в d-m-y
if (!empty($date)) {

    [$year, $month, $day] = explode('-', $date);
    $correctDate = "$day-$month-$year";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="miniSite.css">
</head>
<body>
<h4>Регистрация</h4>
<form action="" method="POST">
    <?php if (!empty($login)): ?>
        <?php if ((isset($checkLogin))): ?>
            <h6>Логин уже занят</h6>
        <?php elseif(strlen($login) < 3 && strlen($login) > 25): ?>
            <h6>Max. длина Login - 25 символов</h6>
        <?php elseif ($loginCheck == 'kiril'): ?>
            <h6>При написанни логина, должна быть только латиница!</h6>
        <?php else: ?>
            <?php $logCheck = 'true'; ?>
            <?php $allChecking[] = $logCheck; ?>
        <?php endif; ?>
    <?php else: ?>
        <h6>Заполните поле "Логин"</h6>
    <?php endif; ?>
    <input name="login" type="text" value="<?php if (!empty($login)) echo $login ?>"> Create Логин <br>

    <?php if (!empty($firstName)): ?>
        <?php if ($nameCheck == 'kiril'): ?>
            <?php $nCheck = 'true'; ?>
            <?php $allChecking[] = $nCheck; ?>
        <?php else: ?>
            <h6>Имя должно быть кирилицей!</h6>
        <?php endif; ?>
    <?php else: ?>
        <h6>Напишите имя! Это обязательно!</h6>
    <?php endif; ?>
    <input name="firstName" type="text" value="<?php if (!empty($firstName)) echo $firstName ?>"> Имя <br>

    <input name="lastName" type="text" value="<?php if (!empty($lastName)) echo $lastName ?>"> Фамилия <br>
    <input name="fatherName" type="text" value="<?php if(!empty($fatherName)) echo $fatherName ?>"> Отчество <br>

    <?php if (!empty($password)): ?>
        <?php if (strlen($password) < 5  || strlen($password) > 25): ?>
            <h6>Max. длина Password - 25 символов, min - 5 символов.</h6>
        <?php elseif($password !== $confirmPassword): ?>
            <h6>Пароли не совпадают!</h6>
        <?php else: ?>
            <?php $passCheck = 'true'; ?>
            <?php $allChecking[] = $passCheck; ?>
        <?php endif; ?>
    <?php else: ?>
        <h6>Заполните поле "Пароль"</h6>
    <?php endif; ?>
    <input name="password" type="password" value="<?php if(!empty($password)) echo $password ?>">Create Пароль <br>

    <input name="confirmPassword" type="password" value="<?php if (!empty($confirmPassword)) echo $confirmPassword ?>">Подтвердите Пароль <br>

    <?php if (!empty($email)): ?>
        <?php if ($emailCheck != 'error'): ?>
            <h6>Некорректный  email</h6>
        <?php else: ?>
            <?php $mailCheck = 'true'; ?>
            <?php $allChecking[] = $mailCheck; ?>
        <?php endif; ?>
    <?php else: ?>
        <h6>Заполните поле "email"</h6>
    <?php endif; ?>
    <input name="email" type="email" value="<?php if (!empty($email)) echo $email; ?>"> Email <br>

    <?php if(empty($date)): ?>
        <h6>Заполните дату рождения</h6>
    <?php else: ?>
        <?php $newCurrentDate = date_create("$currentDate"); ?>
        <?php $newBirthdayDate = date_create("$date"); ?>
        <?php $diffDate = date_diff($newCurrentDate, $newBirthdayDate); ?>
        <?php $resDiff = $diffDate -> format('%y'); ?>
        <?php $dateCheck = 'true'; ?>
        <?php $allChecking[] = $dateCheck; ?>
    <?php endif; ?>
    <input name="date" type="date"> Дата рождения <br>

    <select name="" id="">
        <option value="">USA</option>
        <option value="">France</option>
        <option value="">Spain</option>
    </select> <br>
    <input type="submit">
</form>
</body>
</html>

<?php

// Когда все проверки на ВАЛИДНОСТЬ, пройдены, начинаем дальше
if ($logCheck == 'true' && $passCheck == 'true' && $dateCheck == 'true' && $mailCheck == 'true' && $nCheck == 'true') {

    // Переопр. перемен. $password перед занесением в БД (занесем с хэшом)
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $queryInsert = "INSERT INTO dataUsers SET login='$login',password='$password', email='$email', birthday='$correctDate',dateReg='$currentDate', dateDiff='$resDiff', firstName='$firstName', lastName='$lastName', fatherName='$fatherName', status_id='1'";
    $db_query_insert = mysqli_query($dbConnect, $queryInsert) or die (mysqli_error($dbConnect));



    // Пометка об успешной (автоматической) авторизации
    $_SESSION['auth'] = true;

    // Запишем логин в сессию, для дальнейшего исп
    $_SESSION['login'] = $login;


    // А также, Ф.И.О и дату рождения:
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['fatherName'] = $fatherName;

    // id-шник user(когда регаем user, сохр к нам в сессию)
    $id = mysqli_insert_id($dbConnect);
    $_SESSION['id'] = $id;
    $id = $_SESSION['id'];

    mysqli_close($dbConnect);

    // Редирект, на главную страницу, в случае успешной авторизации
    header('Location: main.php');
    die();

}

?>

<?php //session_destroy(); ?>