
<?php

// 1. Запишем данные из формы в переменную:
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$date = $_POST['date'];
$current_date = date('d-m-Y');

// 2. Теперь подключимся к нашей БД:
$host = 'localhost';
$name = 'root';
$pass = 'Gtahzby7711';
$db_name = 'test_db';

$db_connect = mysqli_connect($host, $name, $pass, $db_name);

// 3. Если форма отправлена
if (!empty($_POST)):

// 4. Регулярное выражение, для проверки email на корректность:
$reg = '#[a-zA-Z0-9\-_]+@[a-z]+\.[a-z]{2,}#';
$check_email = preg_replace($reg, 'success', $email);

// 5. Chrome записывает дату в формате (y-d-m). Преобр. дату в формат (d-m-y):
$arr = explode('-', $date);
list($year, $month, $day) = $arr;
$correct_date = $day . '-' . $month . '-' . $year;

// 6. При заполненых полях: имени, пароля, даты, email
//    Проверим их на корректность:
if (!empty($login) && !empty($password)
    && !empty($email) && !empty($date)) {

    if (strlen($login) <= 3) {
        echo 'Cлишком короткий логин';
    } elseif (strlen($password) < 5) {
        echo 'Cлишком короткий пароль';
    } elseif ($check_email != 'success') {
        echo 'Проверьте email';
    } else {

// 7. Когда форма прошла все проверки, зарегаем нашего юзера.
//    Вставив все его данные в БД.
//    (Помимо этого, автоматически вставим дату его регистрации):
    $query_insert = "INSERT INTO data_of_users SET login='$login',password='$password', email='$email', birthday='$correct_date',date_of_reg='$current_date'";
    $db_query_insert = mysqli_query($db_connect, $query_insert);
        echo 'Ваши данные приняты!';
    }

// 8. Если поля пустые то соотв:
} else {
    echo 'Заполните поля!!';
}

 // 9. Если форма не отправлена, то выводим пустую форму: ?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="base_css.css">
</head>
<body>
    <h4>Регистрация</h4>
    <form action="" method="POST">
        <input name="login" type="text"> Create Логин <br>
        <input name="password" type="password">Create Пароль <br>
        <input name="email" type="email"> Email <br>
        <input name="date" type="date"> Дата рождения <br>
        <input type="submit">
    </form>
</body>
</html>
<?php endif; ?>