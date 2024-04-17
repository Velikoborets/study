
<?php

// Запишем данные из формы в переменную:
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$date = $_POST['date'];
$confirm_password = $_POST['confirm_password'];
$current_date = date('d-m-Y');

// Теперь подключимся к нашей БД:
$host = 'localhost';
$name = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connect = mysqli_connect($host, $name, $pass, $db_name);

// ЛОГИН
// Регулярка, для проверки логина на кирилицу (логин не может быть кирилицей)
$kiril = '#[а-яА-Я]+#u';
$check_kiril = preg_replace($kiril, 'kiril', $login);

// Проверка логина на совпадение в БД:
$query_check_login = "SELECT * FROM data_of_users WHERE login='$login'";
$db_query_check_login = mysqli_query($db_connect, $query_check_login);
$check_login= mysqli_fetch_assoc($db_query_check_login);

// EMAIL
// Регулярное выражение, для проверки email на корректность:
$reg = '#[a-zA-Z0-9\-_]+@[a-z]+\.[a-z]{2,}#';
$check_email = preg_replace($reg, 'error', $email);

// DATE
// Chrome записывает дату в формате (y-d-m). Преобр. дату в формат (d-m-y):
$arr = explode('-', $date);
list($year, $month, $day) = $arr;
$correct_date = $day . '-' . $month . '-' . $year;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>test</title>
    <link rel="stylesheet" href="mini_site.css">
</head>
<body>
<h4>Регистрация</h4>
<form action="" method="POST">

<?php // Когда значение логина/email/пароля отправлено, начинаем проверки
      // И говорим user, что и как заполнять.
      // Если НЕ отправлено - говорим, чтобы user заполнил поля ?>

    <?php if (!empty($login)): ?>
        <?php if ((isset($check_login))): ?>
            <h6>Логин уже занят</h6>
        <?php elseif(strlen($login) < 3 && strlen($login) > 25): ?>
            <h6>Max. длина Login - 25 символов</h6>
        <?php elseif ($check_kiril == 'kiril'): ?>
            <h6>При написанни логина, должна быть только латиница!</h6>
        <?php endif; ?>
    <?php else: ?>
        <h6>Заполните поле "Логин"</h6>
    <?php endif; ?>
    <input name="login" type="text" value="
<?php if (!empty($login)) echo $login ?>"> Create Логин <br>
    <?php if (!empty($password)): ?>
        <?php if (strlen($password) < 3 && strlen($password) > 25): ?>
            <h6>Max. длина Password - 25 символов</h6>
        <?php elseif($password !== $confirm_password): ?>
            <h6>Пароли не совпадают!</h6>
        <?php endif; ?>
    <?php else: ?>
        <h6>Заполните поле "Пароль"</h6>
    <?php endif; ?>
    <input name="password" type="password" value="
<?php if (!empty($password)) echo $password ?>">Create Пароль <br>
    <input name="confirm_password" type="password" value="
<?php if (!empty($confirm_password)) echo $confirm_password ?>">Подтвердите Пароль <br>
    <?php if (!empty($email)): ?>
        <?php if ($check_email != 'error'): ?>
            <h6>Некорректный  email</h6>
        <?php endif; ?>
    <?php else: ?>
        <h6>Заполните поле "email"</h6>
    <?php endif; ?>
    <input name="email" type="email" value="
<?php if (!empty($email)) echo $email ?>"> Email <br>
    <?php if(empty($date)): ?>
        <h6>Заполните дату рождения</h6>
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

// Когда все поля отправлены (а это значит, что все проервки пройдены)
// То записываем данные юзера в БД и др. нюансы в сессию и прочее:
if (!empty($login) && !empty($password)
&& !empty($email) && !empty($date) && !empty($confirm_password)) {

    $query_insert = "INSERT INTO data_of_users SET login='$login',password='$password', email='$email', birthday='$correct_date',date_of_reg='$current_date'";
    $db_query_insert = mysqli_query($db_connect, $query_insert);

    session_start();
    // Пометка об успешной (автоматической) авторизации:
    $_SESSION['auth'] = true;

    // Запишем логин в сессию, для дальнейшего исп:
    $_SESSION['login'] = $login;

    // id-шник user(когда регаем user, сохр к нам в сессию):
    $id = mysqli_insert_id($db_connect);
    $_SESSION['id'] = $id;

    // Редирект, на главную страницу, в случае успешной авторизации:
    header('Location: 3_main.php');
    die();

}