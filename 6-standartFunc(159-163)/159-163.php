
<?php

/**** УРОКИ 159, 160, 161 ****/ ✓

/* Эти уроки - просто "справочник функций". Д.Трепачева */
/* Который так и называется и есть у него на сайте. */
/* Я их бегло проработал, но полностью не изучал. */ 
/* Там около 400 заданий, на одни лишь функции. */

/* Для лучшего понимания как пользоваться справочником */
/* Проработаю только последний, 163 урок, где практика */
/* А так же дополнительно те фу-ии, кот-ые в 162 уроке */



/****** ФУНКЦИИ ДЛЯ ВРЕМЕНИ-ДАТЫ В PHP 162/163 ******/ ✓

// ФУНКЦИИ ВРЕМЕНИ И ДАТЫ TIME() / MKTIME()

// time() - возвр. тек. момент вр. с момента эпохи UNIX в сек.
// Пример:
// echo time() 		// (1708058273)

// mktime() - переводит задан. дату в формат timestamp
// timestamp - кол-во секунд прошедшее с UNIX по задан. мом. вр.
// Пример:
// Получим разницу в секундах между 1970 и 15:45:32 12.12.2024
// echo mktime(15, 45, 32, 12, 22, 2020); 	// 1608641132

// ДЗ(time(), mktime()):

// №1
// Выведите текущее время в формате timestamp.
// echo mktime(07, 54);

// №2
// Выведите 1 марта 2025 года в формате timestamp.
// echo mktime(0, 0, 0, 03, 01, 2025);

// №3
// Выведите 31 декабря текущего года в формате timestamp.
// Скрипт должен работать независимо от года, в котором он зап.
// echo mktime(0, 0, 0, 12, 31, 2024);

// №4
// Найдите количество секунд, прошедших с 13:12:59 15-го марта
// 2000 года до настоящего момента времени.
// echo mktime(13, 12, 59, 03, 15, 2000);

// №5
// Найдите количество ЦЕЛЫХ ЧАСОВ, прошедших с 6:23:48 текущего
// дня до настоящего момента времени.
// $int1 = (int)$current = 
// date('h') . '<br>';	// 09
// $int2 = (int)$mkdate = 
// date('h', mktime(06, 23, 48, 02, 16, 2024)); // 06
// $res = $int1 - $int2;
// echo $res;	// 3


// ФУНКЦИЯ DATE()

// date() - выводит дату в заданном форме.
// date(формат('h - i - y'), timestamp (не обязатаельно))

// ДЗ date():

// №6
// Выведите на экран текущий:
// год, месяц, день, час, минуту, секунду.
// $date = date('Y - d - m - h - s');
// echo $date;

// №7
// Выведите текущую дату-время в форматах 2025-12-31;
// echo $date = date('Y - m - d');

// №8
// С помощью функций mktime и date выведите 12 февраля 2025
// года в формате 12.02.2025.
// echo date('d.m.Y', mktime(0, 0, 0, 02, 12, 2025));

// №9
// 1. Создайте массив дней недели. 
// С помощью этого массива и функции date выведите на 
// экран название текущего дня недели.
// 2. Узнайте какой день недели был 06.06.2006 
// 3. И в ваш birthday

// 9.1
// $arr = ['вс','пн', 'вт', 'ср', 'чт' , 'пт', 'сб'];
// $date = date('w');
// $curr = $arr[$date];

// 9.2
// $arr = ['вс','пн', 'вт', 'ср', 'чт' , 'пт', 'сб'];
// $date = date('w', mktime(0, 0, 0, 6, 6, 2006));
// echo $day = $arr[$date];

// 9.3
// $arr = ['вс','пн', 'вт', 'ср', 'чт' , 'пт', 'сб'];
// $date = date('w', mktime(0, 0, 0, 6, 24, 1997));
// echo $day = $arr[$date]

// №10
// Создайте массив месяцев. С помощью этого массива и функции
// date выведите на экран название текущего месяца.
// $arr = [1 => 'янв','фев', 'мрт', 'апр', 'май' ,
//  'июнь', 'июль', 'авг', 'сент', 'окт', 'нояб', 'дек'];
// $date = date('n');
// echo $res = $arr[$date];

// №11
// Найдите количество дней в текущем месяце.
// Скрипт должен работать независимо от месяца, в кот. он запущ.
// $month = mt_rand(1, 12);
// $res = date('t', mktime(0, 0, 0, "$month", 0, 0));
// echo $res;


// ФУНКЦИЯ STRTOTIME()

// strtotime() - преоб. произвол. дату в формат timestamp
// Пример:
// strtotime('2025-12-31'); 		// 1767128400
// strtotime('10 September 2000'); 	// 968529600
// strtotime('Tomorrow'); 			// 1767128400

// ДЗ strtotime():

// №12
// Дана дата в формате 2025-12-31. С помощью функции strtotime
// и функции date преобразуйте ее в формат 31-12-2025.
// strtotime('2025-12-31');
// echo date('d-n-Y', 1767128400);


// ФУНКЦИЯ DATE_CREATE(), DATE_MODIFY(), DATE_FORMAT():

// date_create() - создаёт объект дата. 
// date_modify() - позв. приб. и отн. от даты опр. пром. врем.
// date_format() - выводит дан. из объекта 'дата' в опр. форм.

// $date = date_create('2026-05-12');	 // создали дату
// date_modify($date, '-2 day'); 		 // - 2 дня 
// echo date_format($date, 'd.m.Y');	 // 14.05.2026 отф-ли

// ДЗ (date_create(), date_modify(), date_format()):

// №13
// В переменной $date лежит дата в формате 2025-12-31
// 1. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год
// 2. Отнимите от этой даты 3 дня.

// $date = date_create('2025-10-20');
// date_modify($date, '-1 month'); 2 days, 1 year, -3 day
// $res = date_format($date, 'd.m.Y');
// echo $res;

// №14
// Узнайте сколько дней осталось до Нового Года.
// Скрипт должен работать в любом году.
// $curDate = date('z');
// $str = date_create('31.12.2020');
// $date = date_format($str, 'z');
// $res = $date - $curDate;
// echo $res;

// №15
// Пусть в переменной содержится некоторый год. 
// Найдите все пятницы 13-е в этом году. 
// Результат выведите в виде массива дат.

// $year = 2009;
// $month = [1 => 'янв','фев', 'мрт', 'апр', 'май' ,
//  'июнь', 'июль', 'авг', 'сент', 'окт', 'нояб', 'дек'];
// $week = ['вс','пн', 'вт', 'ср', 'чт' , 'пт', 'сб'];

// foreach($month as $key => $elem) {
// 	$date = date('w', mktime(0, 0, 0, "$key", 13, "$year"));
// 	$curMonth = date('n', mktime(0, 0, 0, "$key", 13, "$year"));
// 	if ($date == 5) {
// 		echo $month[$curMonth] . ' - ' . $week[$date] . 
// 		 ' 13e' . '<br>';
// 	}
// }

// №16
// Узнайте какой день недели был 100 дней назад.
// $week = ['вс','пн', 'вт', 'ср', 'чт' , 'пт', 'сб'];
// $date = date_create('17-02-2024');
// date_modify($date, '-100 day');
// $day = date_format($date, 'w');
// echo $week[$day];



/****** ПРАКТИКА ПО ФУНКЦИЯМ 163/163 ******/ ✓

/* Порешаем задачи исп-я комб-ю стандарт-ых фу-ий РНР */

// №1
// Дан массив с числами. 
// Найдите среднее арифметическое его элементов.
// $arr = [1, 2, 3, 4, 5];
// $length = count($arr);
// $sum = array_sum($arr);
// echo $res = $sum / $length;

// №2
// Найдите сумму числе от 1 до 100. 
// $range = range(1, 100);
// $sum = array_sum($range);
// var_dump($sum);

// №3
// Выведите столбец чисел от 1 до 100.
// $range = range(1, 100);
// echo $res = implode('<br>', $range);

// №4
// Заполните массив 10-ю иксами.
// $arr = array_fill(0, 10, 'x'); 
// var_dump($arr);

// №4
// Заполните массив 10-ю иксами.
// $arr = array_fill(0, 10, 'x'); 
// var_dump($arr);

// №5
// Заполните массив 10-ю случайными числами от 1 до 10 так
// Чтобы они не повторялись.
// $arr = range(1, 10);
// shuffle($arr);
// var_dump($arr);

// №6
// Найдите факториал заданного числа.
// $a = 4;
// $arr = range(1, 4);
// $res = array_product($arr);
// var_dump($res);

// №7
// Дано число. Найдите сумму цифр этого числа.
// $a = 4;
// $arr = range(1, 4);
// $res = array_sum($arr);
// var_dump($res);

// №8
// Дана строка. Сделайте заглавным последний символ этой строки.
// $str = 'abcd';
// $reverse = strrev($str);
// $high = ucfirst($reverse);
// $str = strrev($high);

// №9
// Дан массив с числами. 
// Получите из него массив с квадратными корнями этих чисел.
// sqrt - квадратный корень числа:
// $arr = [4, 9, 16, 20];
// Реш. при-м ко всем эл-там массива, с пом. фу-ии array_map()
// $res = array_map('sqrt', $arr);
// var_dump($res);

// №10
// Заполните массив числами от 1 до 26, 
// так чтобы ключами этих чисел были буквы анг. алфавита.
// range('a', 'z'); - тоже формирует числа.
// array_combine($arr ключ, $arr знач.) - сливает массив
// $letters = range('a', 'z');
// $arr = array_combine($letters, range(1, 26));
// var_dump($arr);

// № 11
// Дана строка '1234567890'. Найдите сумму цифр из этой строки.
// $str = '1234567890';
// $arr = str_split($str, 1);
// $sum = array_sum($arr);
// var_dump($sum);

// № 12
// Дана строка '1234567890'. Найдите сумму пар чисел.
// 12 + 34 + 56 + 78 + 90:
// $str = '1234567890';
// $arr = str_split($str, 2);
// $sum = array_sum($arr);
// var_dump($sum);

// № 13
// Используя комбинацию фу-ий зап. массив след. образом:

// $arr = [
// [1, 2, 3], 
// [4, 5, 6], 
// [7, 8, 9]
// ];

// $range = range(1, 9);
// $res = array_chunk($range,3);
// var_dump($res);
?>