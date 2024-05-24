<?php

/** ОСНОВЫ РАБОТЫ С ФОРМАМИ В PHP 252/274 ✓ **/

// action - файл, куда будет отпр. форма.
// input  - поля ввода текста.
// type   - типы инпутов.
// name   - их имена (потом идет связсь через них в $_POST)
// submit - тип инпута, отправка (radio checkbox итд)

// ДЗ (написать простую форму, как заготовку style в отд. файле):
?>
<!--
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
<form method="get">
	<div class="form__container">
		<label for="name"> Имя:
		<input name="name" type="text">
	</div>
	<div class="form__container">
		<label for="last_name"> Фамилия:
		<input name="last_name" type="text">
	</div>
	<div class="form__container">
		<label for="year"> Возраст:
		<input name="year" type="text">
	</div>
	<div class="form__button-container">
		<input class="submit__styles" type="submit" value="send">
	</div>
</form>
</body>
</html>
</html>
-->


<?php

/** МЕТОД ОТПРАВКИ ФОРМЫ В PHP 253/274 ✓ **/

// Когда отправляем с помощью $_GET :
// (данные отправ. в адресную строку браузера).
// ?first_name=Artur&last_name=Velikoborets&salary=1000%24
// (после "?", стоят имена импутов и(&) введенные usr, значения).

// Когда отправляем с помощью $_POST :
// (данные отправляются в Супер.Глоб.Массив $_POST)
// (откуда мы их можем вытягивать и манипулировать ими)

// ДЗ (методты отправки формы):
// проверил оба метода:
// 1. При $_GET отправляет в адр.строку браузера
// 2. При $_POST отпр. в С.Г.М $_POST (их не видно, надо вытягивать).



/** ПОЛУЧЕНИЕ ДАННЫХ ФОРМ В PHP 254/274 ✓ **/

// При отправке данных методом "post", "get", "request"
// данные запишутся в С.Г.М ($_POST, $_GET, $_REQUEST)

// При этом:
// input name = "ключи массива"
// значения = "то что ввел user в поле"
// ('first_name' => string 'Artur')

// А на стр. куда мы их отправляем (т.е к примеру в result.php)
// Мы можем извлечь эти данные из С.Г.М



/** ПОЛУЧЕНИЕ ДАННЫХ ФОРМ МЕТОДОМ GET В PHP 255/274 ✓ **/

// page2.php
// напишем <form method="get" action="result.php" >
// где вводим имя и фамилию (John Smith)

// result.php
// var_dump($_GET);
// echo $_GET['first_name']

// теперь, после нажатия submit будет:
// first_name => John
// last_name => Smith
// John

// ДЗ (Получение данных форм методом GET в РНР):

// page2.php
// first_name => 1
// last_name => 2

// result.php
// echo $_GET['first_name'] + $_GET['last_name']; // 3



/** ПОЛУЧЕНИЕ ДАННЫХ ФОРМ МЕТОДОМ POST В PHP 256/274 ✓ **/

// МЕТОД "post" - в отл. от "get", ничего не добав. в адр. строку.
// И хранит данные сугубо в С.Г.М $_POST.

// ДЗ (Получение данных методом $_POST):

// 1
// вывести данные usr на экран

// page2.php
// <form action="result.php" method="post">

// result.php
// echo $_POST['first_name'] . '<br>';
// echo $_POST['last_name'] . '<br>';
// echo $_POST['salary'] . '<br>';


// 2
// спрашиваем пароль, сообщаем, совпадает ли он с правильным

// page2.php
// <form action="/result.php" method="POST">
//	<input type="password" name="pass">
//	<input type="submit">
// </form>

// result.php
// $pass = '12345';
// if ($_POST['pass'] != $pass) {
//     echo 'Не правильный пароль!';
// } else {
//     echo 'Пароль правильный!';
// }


// 3
// Узнаем данные, сообщаем в какой день родился usr:

// page2.php
//<div class="form__container">
//	<label for="year">Год:</label>
//	<input name="year" type="text">
// </div>

// result.php
// $year = $_POST['year'];
// $month = $_POST['month'];
// $day = $_POST['day'];

// $stamp = strtotime("$year-$month-$day");

//$date = date('w', "$stamp");
//$arr = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
//echo $res = $arr[$date];



/** ОБРАБОТКА ФОРМЫ В ОДНОМ ФАЙЛЕ PHP 257/274 ✓ **/

// если <form action="" method=""> то форма будет отпр. туда же
// ( для наглядности лучше вывести ее с пом. var_dump($_GET) )
// 1й вывод - будет пусто. 2й вывод - выведет данные формы.

// При этом, если мы захотим сложить эл-ты <form>
// То при 1-ом заходе, выведет ошибку
// т.к $_GET пуст, а мы обращаемся к его элементам

// page2.php
// Для этого добавим условие:
/* если форма не пустая, то суммируем:
if (!empty($_GET)) {
    echo $_GET['test1'] + $_GET['test2'];
} */



/** СКРЫТИЕ ФОРМЫ ПОСЛЕ ОТПРАВКИ В PHP 258/274 ✓ **/

// Возьмем форму из ДЗ урока (257)
// (т.е форму с обработкой в 1 файле)

// Сделаем, чтобы форма пряталась после отправки:
/*
<?php if (empty($_GET)): ?>
<form action="" method="GET">
    <input name="test1">
    <input name="test2">
    <input type="submit">
</form>
<?php else: ?>
    <?=$_GET['test1'] + $_GET['test2']; ?>
<?php endif;>
*/

// ДЗ (скрытие формы):
/*
<?php if (!empty($_GET)): ?>
// ЕСЛИ ФОРМА ЗАПОЛНЕНА - ТО ВЫВЕДИ ТОЛЬКО "HELLO USER!"
<?='hello user!'; ?>
<?php else: ?>
// ИНАЧЕ ЕСЛИ ПУСТО, ТО ЕСТЬ ТОЛЬКО ФОРМА
<form  action="" method="get">
	<div class="form__container">
		<label for="year">Год:</label>
		<input name="year" type="text">
	</div> итд
<?php endif; ?>
*/



/** СОХРАНЕНИЕ ЗНАЧЕНИЙ ФОРМЫ ПОСЛЕ ОТПРАВКИ В PHP 259/274 ✓ **/

// Сохранение значений, аналогично сохранению формы
// 1. Сначала проверка на существование (каб не было ошибки)
// 2. И если оно существует, то просто выводим знач. кот. ввели:

/*
<form action="" method="GET">
<input
    name="test"
    value="<?php if (isset($_GET['test'])) echo $_GET['test'] ?>"
>
	<input type="submit">
</form>
*/

/* ДЗ (сохранение значений формы после отправки в РНР):

    <div class="form__container">
    <label for="city">Город:</label>
    <input name="city" type="text" value="
<?php if(isset($_GET['city'])): ?>
<?=$_GET['city']; ?>
<?php endif; ?>"
    >
    </div>
*/



/** СОХРАНЕНИЕ ЗНАЧЕНИЯ ПО УМОЛЧАНИЮ ФОРМЫ В PHP 260/274 ✓ **/

/*
Чтобы при заходе на стр. уже был текст в инпутах
И чтобы мы могли его поредактировать
И он остался после отправки формы

Нам надо:
1. Прописать условие из пред. задания (где инпуты сохр. ког. зап.)
2. Добавить else, в котором указать значение по умолчанию
*/

/* ДЗ (Сохранение значения по умолчанию формы в РНР):

<div class="form__container">
    <label for="year">Год:</label>
    <input name="year" type="text" value="<?php
if(isset($_GET['year'])) {
	$year = $_GET['year'];
	$date = date('L', strtotime("01-01-$year"));
	if ($date == 1) {
		echo 'год високосный';
	} else {
		echo 'год не високосный';
	}
} else {
	echo date('Y');
}
?>"
>
</div>
*/



/** СОКРАЩЕННЫЙ КОД ДЛЯ СОХРАНЕНИЯ ЗНАЧЕНИЙ ПО УМОЛЧАНИЮ В PHP 261/274 ✓ **/

/* Запишем пред. код сокращенно:

<div class="form__container">
<label for="year">Год:</label>
<input name="year" type="text" value="
<?php if(isset($_GET['year'])): ?>
<?php $date = date('L', strtotime ("01-01-\$_GET[\'year\']")); ?>
<?=($date == 1) ? 'год високос' : 'год не високос'; ?>
<?php else: ?>
<?=date('Y'); ?>
<?php endif; ?>">
</div>

*/

/*
Вспоминаем тернарные и сокр проверку на isset:
1. Условие "?" если тру то тут че-то : Иначе тут че-то
2. Условие и сразу вывод если true ?? иначе че-то
*/

/* 1
С помощью трех инпутов спросите у пользователя год, месяц и день. После отправки формы выведите на экран, сколько дней осталось от введенной даты до Нового Года. По заходу на страницу сделайте так, чтобы в инпутах стояла текущая дата.

<div class="form__container">
		<label for="year">Год:</label>
		<input name="year" type="text" value="
<?=isset($_GET['year']) ? $year = $_GET['year']:date('Y'); ?>">
</div>
<?php
if (!empty($_GET)) {
	$date = date('z', strtotime("$year-$month-$day"));
	echo $res = 365 - $date;
}
*/



/** ЭЛЕМЕНТ TEXTAREA В PHP 262/274 ✓ **/

// textarea - многострочное поле ввода (напр. для комментов)

// ДЗ (э-т textarea в РНР):
/* 1
Попросите пользователя оставить отзыв на сайт. После отправки формы выведите этот отзыв на экран.

<textarea name="comment" rows="4" cols="40">
// вывод на экран реализован в непоср. в textarea:
<?=$_GET['comment'] ?? 'коммент не оставлен!'?>
</textarea>
*/



/** СОХР. ЗНАЧЕНИЯ TEXTAREA ПОСЛЕ ОТПРАВКИ В PHP 263/274 ✓ **/

/* 1
Пусть в textarea вводится русский текст. После отправки формы выведите на экран транслит этого текста. Сделайте так, чтобы содержимое формы сохранялось после отправки.

<textarea name="comment" rows="4" cols="40">
// если коммент сущ. то его содержимое сохр. посл. отпр.
<?=$_GET['comment'] ?? 'коммент не оставлен!'?>
</textarea>

// когда форма отправлена, то прогоняем ее через фу-ю:
if (!empty($_GET)) {
	$comment = $_GET['comment'];
	function translit($value) // крафтовая фу-я из инета.
	$res = translit($comment);
	echo $res;
} */



/** ЧЕКБОКС 264/274 ✓ **/

// <input type="checkbox" name="ch">  создает чекбокс (ставить галку)
// В $_GET['ch'] - будет содержаться только "on" или "null"

// мини-задание:
// вывести что-либо на экран при условии, что флажок отмечен.
/*
 * если форма была отправлена:
<?php if (!empty($_GET)): ?>
<?= if (isset($_GET['check'])) ? 'флажок отм' : 'флажок не отм';
<?php else ?>
<?=отметь флажок ?>
<?php endif; ?>
*/


// ДЗ (Чекбокс в РНР):
/* 1
Сделайте форму с инпутом и флажком. С помощью инпута спросите у пользователя имя. После отправки формы, если флажок был отмечен, поприветствуйте пользователя, а если не был отмечен - попрощайтесь.

<input name="check" type="checkbox">
<?php if (!empty($_GET)): // после отправки формы ?>
<?=isset($_GET['check']) ? 'hello user' : 'bye user' ?>
<?php endif; ?>
*/



/** НЮАНСЫ ИСПОЛЬЗОВАНИЯ ЧЕКБОКСОВ В PHP 265/274 ✓ **/

// Помним, что по умолчанию при отправке чекбокса на сервер
// Если он отмечен - "check=on".
// Если он НЕ отмечен - null. (т.е ничего)
// Соотв. когда null, мы не попадаем под if (!empty($_GET));
// (т.е не можем узнать отметил ли user чекбокс или нет)

// Для решения, создаём скрытый инпут:
// <input type="hidden" name="flag" value="0">
// <input type="checkbox" name="flag" value="1">

// Теперь мы попадаем под условие (!empty($_GET))
// На сервер будет отправляться:
// "check=0" - когда флажок не отмечен (и мы знаем об этом)
// "check=1" - когда флажок отмечен (отправляются оба значения)
// (но т.к value="1", стоит ниже, оно просто перекроет value="0")

// Пример из урока:
/*
<div class="form__container">
    <input name="check" type="hidden" value="0">
    <input name="check" type="checkbox" value="1">
</div>

<?php if (!empty($_GET)): ?>
<?=($_GET['check'] == 1) ? 'флажок отмечен' : 'флажок не отмечен' ?>
<?php endif; ?>
*/

// ДЗ (Нюансы исп. чекбоксов:)
// 1
/*
<div class="form__container">
    <label for="check"> Вам есть 18 ?
    <input name="check" type="hidden" value="0">
    <input name="check" type="checkbox" value="1">
</div>

<?php if (!empty($_GET)): ?>
<?=($_GET['check'] == 1) ? 'добро пожаловать' : 'вам ещё нет 18!' ?>
<?php endif; ?>
*/



/** СОХР.ВЫБР. ЗНАЧ. В ЧЕКБОКСЕ ПОСЛЕ ОТПРАВКИ В PHP 266/274 ✓ **/

// озн. что мы должны сохранить галочку чекбокса (а не текст)
// "checked" - атрибут для checkbox или radio, который ставит галочку
// соотв. напишем проверку, чтобы когда ее ставить:

// есл флаг сущ и при отправке на сервер == 1, то поставь галку
// if (isset($_GET['flag']) && $_GET['flag'] == 1) echo 'checked';

// упрощенная проверка от обратного:
// <?php if (!empty($_GET['flag'])) echo 'checked'; ?\>

// * тут надо следить за <input value = 0>, потому, что
// если будет 1, то оно при отправке пустой формы будет ставить ✓
// (т.е потеряется смысл скрытого input)

// ДЗ (сохр. выбр. знач. посл. отпр):
/*
<div class="form__container">
    <input name="flag1" type="hidden" value="0">
    <input name="flag1" type="checkbox" value="1"
<?php if(!empty($_GET['flag1'])) echo 'checked'?>
    >
    <input name="flag2" type="hidden" value="0">
    <input name="flag2" type="checkbox" value="1"
<?php if(isset($_GET['flag2']) && $_GET['flag2'] == 1) echo 'checked'?>
    >
</div> */



/** РАДИОКНОПКИ В PHP 267/274 ✓ **/

// У радиокнопок такой же принцип работы как и у checkbox

// За исключением того, что у radio:
// 1. Один hidden input (из-за одинак. имен нет смысла во втором);
// 2. Одинаковые имена для взаимоискл. но разные знач. чтобы выбирать

// <input type="radio" name="radio" value="1" > // одинак. имена
// <input type="radio" name="radio" value="2">  // разн. input


// В отличии от checkbox, у которых:
// 1. Для каждого input, свой hidden (чтобы можно было выб. неск-ко)
// 2. Для пункта 1, разные имена, но значения одинаковые:

// <input name="flag1" type="hidden" value="0">
// <input name="flag1" type="checkbox" value="1">
// <input name="flag2" type="hidden" value="0">
// <input name="flag2" type="checkbox" value="1"

/* ДЗ (С помощью двух переключателей спросите у пользователя его пол. Выведите результат на экран):

// Создаём 2 переключателя с сохраняемыми значениями:
<div class="form__container">
    <label for="woman">Ваш пол:</label>
    <input name="radio" type="hidden" value="0">
    <input name="radio" type="radio" value="1"
<?php if (isset($_GET['radio']) &&  $_GET['radio'] == 1 ) echo 'checked'?>
    >жен
    <input name="radio" type="radio" value="2"
<?php if (isset($_GET['radio']) &&  $_GET['radio'] == 2 ) echo 'checked'?>
    >муж
</div>

// Выводим результат выбора пользователя:
<?php if (!empty($_GET) && $_GET['radio'] == 1): ?>
<?='woman' ?>
<?php elseif(!empty($_GET) && $_GET['radio'] == 2): ?>
<?='man' ?>
<?php else: ?>
<?=''?>
<?php endif; ?> */



/** СОХРАНЕНИЕ ВЫБРАННОГО ЗНАЧЕНИЯ В РАДИОКНОПКАХ ПОСЛЕ ОТПРАВКИ В PHP 268/274 ✓ **/

// Выставление галки "checked" <внутри input>,  либо так:
// <?if (isset($_GET['radio']) && $_GET['radio'] == 2) echo 'checked' ?\>

// либо так:
// if (!empty($_GET['radio']) and $_GET['radio']=== '1') echo 'checked';

// ДЗ (сохранение выбранного значения в радиокнопках после отправки):
/*
<div class="form__container">
    <label>Язык:</label>
    <input name="radio" type="hidden" value="0">
    <input name="radio" type="radio" value="1"
<?php if (isset($_GET['radio']) &&  $_GET['radio'] == 1 ) echo 'checked'?>
    >Англ
    <input name="radio" type="radio" value="2"
<?php if (isset($_GET['radio']) &&  $_GET['radio'] == 2 ) echo 'checked'?>
    >Рус
</div>
*/



/** СЕЛЕКТЫ В PHP 269/274 ✓ **/

// (текст, что ниже и есть ДЗ)

/* Создаёем выпадающий список:
<select name="country">
    <option>item1</option>
    <option>item2</option>
    <option>item3</option>
</select>

В $_GET['country'] - в зави-ти от выбора, хранятся знач. option
// которые указаны между тегами <option>.
*/



/** АТРИБУТ VALUE В СЕЛЕКТАХ В PHP 270/274 ✓ **/

// <select name="list">
// <option value="1">item1</option>
// </select>

// При исп. атрибута value и выводе select с помощью:
// var_dump($_GET['list'])
// В ($_GET['list']) будут хран. знач "value"
// А не то, что находится между тегом.

// ДЗ (атрибут value в селектах):

/* 1. Объясните, чем удобнее такой подход?
Я думаю, тем, что мы можем сохранять значения после отправке формы
*/

/* 2. С помощью выпад. списка, попросите usr выбрать его язык:
<select name="list">
    <option value="1">Русский</option>
    <option value="2">Немецкий</option>
    <option value="3">Английский</option>
</select>
*/



/** СОХРАНЕНИЕ ЗНАЧЕНИЯ В СЕЛЕКТАХ ПОСЛЕ ОТПРАВКИ В PHP 271/274 ✓ **/

// Принцип работы в сохранения "value"  в option, аналогичен принципу
// сохранения знач. у "radio"
// option, как и radio взаимоисключают друг-друга.
// поэтому имена должны быть одинаковыми, а значения разными:
/*
<?php if (!empty($_GET['test']) && $_GET['test'] === '2'): ?>
<?='selected' ?>
<?php endif; ?>
*/

/* ДЗ (сохранение значения в селектах после отправки):
// (модифировали задачу так, чтобы сохранялись значения в селектах)

<select name="country">
    <option value="1"
<?php if (!empty($_GET['country']) && $_GET['country'] === '1'): ?>
<?='selected' ?>
<?php endif; ?>
    >Russia</option>
    <option value="2"
<?php if (!empty($_GET['country']) && $_GET['country'] === '2'): ?>
<?='selected' ?>
<?php endif; ?>
    >Belarus</option>
</select>
*/


/** GET ЗАПРОСЫ В PHP 272/274 ✓ **/

// $_GET можно вбивать данные в ручную адр.строку браузера:
// (по сути иммитация отправки формы, по другому "$_GET - запрос"):

// ?par1=1&par2=2 , в результате var_dump($_GET) будет:
// 'par1' => string '1' (length=1)
// 'par2' => string '2' (length=1)

// ДЗ (get-запросы):

// 1
// Отправить get-запросом число и вывести его:
// "?1=1" , ну и var_dump($_GET)

// 2
// Отправьте с помощью GET-запроса число. Выведите на экран квадрат этого числа.
/*
?a=2
$res = $_GET['a'] * $_GET['a'];
*/

// 3
// Отправьте с помощью GET-запроса два числа. Выведите его на экран сумму этих чисел.
/*
?a=2&b=3
$sum = $_GET['a'] + $_GET['b'];
*/

// 4
// Пусть с помощью GET-запроса отправляется число. Сделайте так, чтобы если передано число 1 - на экран вывелось слово 'hello', а если 2 - то слово 'bye'
// ?1=hello&2=bye
// var_dump($_GET['1']); // hello
// var_dump($_GET['2']); // bye

// 5
// Пусть с помощью GET-запроса можно передать число. Сделайте так, чтобы на экран вывелся элемент массива с переданным в запросе номером.
// типа вводишь число - а выводит значение
// и вводить надо в адр.строке
// $_GET = ['a', 'b', 'c', 'd', 'e'];
// var_dump($_GET['4']);



/** GET ЗАПРОСЫ С ПОМОЩЬЮ ССЫЛОК В PHP 273/274 ✓ **/

// Польз. не будет вбивать GET-запрос вручную через адр. строку
// Для этого есть ссылки, содерж. параметры GET-запроса
// Польз. будет переходить по ссылкам и автомат. отпр. GET-запросы:

// В рез-тате в адр. строке появ. то, что после знака "?"
// <a href="index.php?par1=1&par2=2">ссылка</a>

// если обращаемся к текущей странице, то index.php можно не указ.
// <a href="?par1=1&par2=2">ссылка</a>

// ДЗ (GET-запросы с помощью ссылок):
// 1
// Сделайте три ссылки. Пусть первая передает число 1, вторая - число 2, третья - число 3. Сделайте так, чтобы по нажатию на ссылку на экран выводилось ее число.
/*
<a href="?1=1">ссылка1</a>
<a href="?2=2">ссылка2</a>
<a href="?3=3">ссылка3</a>
<?php if (isset($_GET['1'])) echo $_GET['1']?>
<?php if (isset($_GET['2'])) echo $_GET['2']?>
<?php if (isset($_GET['3'])) echo $_GET['3']?>
*/

// 2
// Сформируйте в цикле 10 ссылок. Пусть каждая ссылка передает свое число. Сделайте так, чтобы по нажатию на ссылку на экран выводилось ее число
/*
<?php for ($i = 1; $i <= 10; $i++): ?>
<a href="?<?php echo "$i=$i" ?>">ссылка<?php echo "$i" ?></a>
<?php if (isset($_GET[$i])) echo $_GET[$i] . ' ' . '<br>'?>
<?php endfor; ?>
*/

// 3
// Дан массив:
// $arr = ['a', 'b', 'c', 'd', 'e'];
// Сделайте так, чтобы с помощью GET запроса можно было вывести любой элемент этого массива. Для этого с помощью цикла foreach сделайте ссылку для каждого элемента массива.
/*
<?php $arr = ['a', 'b', 'c', 'd', 'e']; ?>
<?php foreach ($arr as $elem): ?>
<a href="?<?php echo "$elem=$elem" ?>">элем - "<?php echo $elem  ?>"</a>
<?php if(isset($_GET["$elem"])) echo ($_GET["$elem"]) . '<br>' ?>
<?php endforeach; ?>
*/



/** ПРАКТИКА НА ФОРМЫ В PHP 274/274 ✓ **/


// 1
// Напишите скрипт, который будет преобразовывать температуру из градусов Цельсия в градусы Фарингейта. Для этого сделайте инпут и кнопку
/*
<div class="form__container">
<label for="convert">Цельсий В Фаренгейт</label>
<input name="convert" type="text" value="
<?php if(isset($_GET['convert'])): ?>
<?php $convert = $_GET['convert']; ?>
<?php $res = $convert * 33.8; ?>
<?="$res". 'F'?>
<?php else: ?>
<?='default 100C'?>
<?php endif;?>">
</div>
*/


// 2
// Напишите скрипт, который будет считать факториал числа. Само число вводится в инпут и после нажатия на кнопку пользователь должен увидеть результат.
/*
<div class="form__container">
<label for="factorial">Факториал числа</label>
<input name="factorial" type="text" value="
<?php
if (!empty($_GET)) {
$num = $_GET['factorial'];
function factorial ($num) {
 if ($num <= 1) return 1;
 return $num * factorial($num - 1);
}
echo factorial($num);
}
?>">
</div>
*/


// 3
// Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа.
/* <input name="del" type="text" value="
<?php
if (!empty($_GET)) {
$del = $_GET['del'];
	for ($i = 1; $i < $del; $i++) {
		if ($del % $i == 0) {
			echo $i . ' ';
		}
	}
}
?>
">
</div> */


// 4
// Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите список общих делителей этих двух чисел.
/*
if (!empty($_GET)) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    for ($i = 1; $i < $num1 && $i < $num2; $i++) {
        if ($num1 % $i == 0 && $num2 % $i == 0 ) {
            echo $i. '<br>';
        }
    }
}
*/


// 5
// Напишите скрипт, который будет находить корни квадратного уравнения. Для этого сделайте 3 инпута, в которые будут вводиться коэффициенты уравнения.

/* Пример:
 Решить уравнение: x2 - 6x + 9 = 0.

Как решаем:
1.Определим коэффициенты: a = 1, b = -6, c = 9.

2.Найдем дискриминант: D = b2 - 4ac = (-6)2 - 4 * 1 * 9 = 36 - 36 = 0.

3. D = 0, значит уравнение имеет один корень:
   (D > 0 - два равных корня, D < 0 - нет корней).

// находим этот корень:
		-b - √D      -6 + √0     6
4. х =     2a    =    2 * 1   =  2  = 3

<h3>Квадратный корень уравнения</h3>
<label for="num1">Введите число 1(а):</label>
<input name="num1" type="text" value="">
<label for="num2">Введите число 2(b):</label>
<input name="num2" type="text">
<label for="num3">Введите число 3(c):</label>
<input name="num3" type="text">

if (!empty($_GET)) {
	$num1 = $_GET['num1']; //  1;
	$num2 = $_GET['num2']; // -6;
	$num3 = $_GET['num3']; //  9;

	$d = ($num2*$num2) - (4*$num1*$num3);

	if ($d > 0) {
		$res1 = (-$num2 - (sqrt($d))) / 2*$num1;
		$res2 = (-$num2 + (sqrt($d))) / 2*$num1;
		echo '(d > 0) значит 2 корня:  ' . $res1 . '<br>'. $res2;
	} elseif ($d == 0) {
		$res1 = (-$num2 - (sqrt($d))) / 2*$num1;
		echo '(d == 0) зн. 1 корень: ' . $res1;
	} else {
		echo 'корней нет! (d < 0)';
	}
}
*/


// 6
// Даны 3 инпута. В них вводятся числа. Проверьте, что эти числа являются тройкой Пифагора: квадрат самого большого числа должен быть равен сумме квадратов двух остальных.

// Тройка пифагора - есть 3 числа - 3,4,5
// квадрат самого большого числа т.е 5 (25)
// должен быть равен сумме квадратов двух ост: 3(9) + 4(16) итого 25
/*
if (!empty($_GET)) {
    $num1 = $_GET['num1']; //  3;
    $num2 = $_GET['num2']; //  4;
    $num3 = $_GET['num3']; //  5;

    if ($num3*$num3 == (($num2*$num2)+($num1*$num1))) {
        echo 'это тройка пифагора!!';
    } else {
        echo 'не тройка пифагора!((';
    }
}
*/


// 7
// Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.
/*
<h3>Сколько дней до ДР</h3>
<label for="hb">Дата рождения:</label>
<input name="hb" type="text" placeholder="22.12.2000"
value="
<?php  if (isset($_GET['hb'])) echo $_GET['hb']?>"
>

if (!empty($_GET)) {

    $hb = $_GET['hb'];
    $dateUser = date('d.m.Y', strtotime($hb));
    $dateCurrent = date('d.m.Y');

    $date1 = date('z', strtotime("$dateUser"));
    $date2 = date('z', strtotime("$dateCurrent"));
    $res = $date1 - $date2;

    if ($res > 0) {
        echo $res;
    } else {
        echo $res = 365 + $res;
    }
}
*/


// 8
// Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов и количество символов в тексте.
/*
if (!empty($_GET)) {

    // количество слов:
    $str = $_GET['text'];

    $reg = '#\b[a-z]+\b\s*#';
    preg_match_all($reg, $str, $arr);
    foreach ($arr as $elem) {
        $res = count($elem);
        echo 'количество слов: ' . "$res" . '<br>';
    }

    // количество всех символов:
    $reg = '#[a-z\s]#';
    preg_match_all($reg, $str, $arr);
    foreach ($arr as $elem) {
        $res = count($elem);
        echo 'количество символов: ' . "$res";
    }
}
*/


// 9
// Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.
/*
<div class="form__container">
    <h3>Процентное содержание каждого из символов:</h3>
    <textarea name="str"></textarea>
</div>
*/
/* if (!empty($_GET)) {

    $str = $_GET['str'];
    $reg = '#[a-z\s]#';
    preg_match_all($reg, $str, $arr);

    foreach ($arr as $elem) {
        $count = count($elem); // 5 = 100%
        $test = array_count_values($elem); // a = 3. s =2. d=2

        foreach ($test as $key => $value) {
            if (!empty($test)) {
                $res = ($value * 100) / $count;
                $readyRes = round($res, 2);
                echo "символ $key составляет - " . $readyRes . '%' . '<br>';
            }
        }
    }
} */


// 10
/* Даны 3 селекта и кнопка. Первый селект - это дни от 1 до 31, второй селект - это месяцы от января до декабря, а третий - это годы от 1990 до 2025. С помощью этих селектов можно выбрать дату. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате.

<div class="form__container">
		<h3>Вывод дня недели:</h3>
		<label for="day">day:</label>
		<select name="day">
<?php for ($i = 1; $i <= 31; $i++): ?>
<?="<option>$i</option>"?>
<?php endfor; ?>
		</select>
		<label for="month">month:</label>
		<select name="month">
<?php for ($j = 1; $j <= 12; $j++): ?>
<?="<option>$j</option>"?>
<?php endfor; ?>
		</select>
		<label for="year">year:</label>
		<select name="year">
<?php for ($k = 1990; $k <= 2025; $k++): ?>
<?="<option>$k</option>"?>
<?php endfor; ?>
		</select>
	</div>

if (!empty($_GET)) {

$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];

$create_date = date_create("$year-$month-$day");
$date_format  = date_format($create_date, 'Y-m-d');
$date = date('w', strtotime("$date_format"));
$arr = ['вс', 'пн', 'вт', 'чт', 'пт', 'сб'];
$res = $arr[$date];
echo $res;
}
*/


// 11 (ЗАДАНИЕ НЕ РЕАЛИЗОВАНО ДО КОНЦА, ТК МАЛО ВРЕМЕНИ, НО СУТЬ ЕГО МНЕ ПРИМЕРНО ПОНЯТНА)
// Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.
/*
if (!empty($_GET)) {
    $date = $_GET['date'];

// ОВЕН (правда можно и самому посчитать)
    $date1 = date_create('21-03-2022');
    $date2 = date_create('20-04-1991');

    $date_format1 = date_format($date1,'d-m-Y');
    $date_format2 = date_format($date2,'d-m-Y');

    $date1_z = date('z', strtotime("$date_format1"));
    $date2_z = date('z', strtotime("$date_format2"));

    if ($date > $date1_z && $date < $date2_z) {
        echo 'Ваш знак овен';
    }

}

// ОСНОВНЫЕ ВЕХИ РАЗВИТИЯ ПРОЕКТА:
// 1 рак = [предсказание1 12.03.2024, предсказание 12.04... ]
// 2 дата рождения
// 3 опр. знак гороскопа (отправка формы)
// 4 и выводим предсказание на тек.день
?>
