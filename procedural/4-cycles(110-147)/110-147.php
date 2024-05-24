
<?php

//************ ЦИКЛ FOREACH В PHP 110\147 **********// ✓

// foreach - перебирает все элементы массива.

// foreach ($nameArr as $varElement) {body cycle}

// $nameArr - имя перебираемого массива
// $varElement - перем, в кот. при каждом проходе попадает элем. $arr



//******** ЭЛЕМЕНТЫ МАССИВА ЧЕРЕЗ FOREACH В PHP 111\147 *******// ✓

// $arr = [1, 2, 3, 4, 5];
// 
// foreach ($arr as $elem) {
// 	echo $elem;
// }



//******** СТОЛБЕЦ ЭЛЕМЕНТОВ МАССИВА В PHP 112\147 *******// ✓

// к пред. примеру просто добавим '<br>'
// $arr = [1, 2, 3, 4, 5];
// 
// foreach ($arr as $elem) {
// 	echo $elem . '<br>';
// }



//******** КВАДРАТЫ ЧИСЕЛ В PHP 113\147 *******// ✓

// умножим элемент(значение) на самого себя:
// $arr = [1, 2, 3, 4, 5];

// foreach ($arr as $elem) {
	// echo $elem * $elem . '<br>';
// }



//******** НАКОПЛЕНИЕ СУММЫ В PHP 114\147 *******// ✓

// найти сумму элементов(значений) массива:

// $arr = [1, 2, 3, 4, 5];
// foreach($arr as $elem) {
// 	$sum += $elem;
// }
// echo $sum;


// найти ср. арифметическое эл. массива(значений):

// $arr = [1, 2, 3, 4, 5];

// foreach ($arr as $elem) {
//	$sum += $elem;
// }

// $count = count($arr); 
// $del = $sum / $count;

// echo $del;



//****** ПОЛУЧЕНИЕ КЛЮЧЕЙ В ЦИКЛЕ FOREACH В PHP 115\147 *****// ✓

// столбец ключей и элементов в формате green - зеленый:

// $arr = ['green' => 'зеленый', 
// 'red' => 'красный','blue' => 'голубой']; 

// foreach ($arr as $key => $value) {
// 	echo $key .' - '. $value . '<br>';
// }



//****** ПЕРЕБОР МАССИВА И IF В PHP 116\147 *****// ✓

// Внутри foreach можно исп-ть условие if.
// Задание: при переборе массива выводить элементы с чётными числами:

// №1
// Выводим чётныем элементы массива:
// $arr = [1, 2, 3, 4, 5, 6,];

// foreach ($arr as $value) {
//	if ($value % 2 == 0) {
//		echo $value . '<br>';
//	}
// }


// №2
// Вывести те элементы массива, которые больше 3х, но меньше 10:
// $arr = [1, 2, 3, 4, 5, 6,];

// foreach ($arr as $value) {
// 	if ($value > 3 && $value < 10) {
// 		echo $value . '<br>';
// 	}
// }


// №3
// Числа могут быть положительными и отрицательными. 
// Найдите сумму положительных элементов массива.
// $arr = [-1, -2, 3, -4, 5, 6,];
 
// foreach ($arr as $value) {
// 	if ($value > 0) {
// 		$sum += $value;
// 	}
// }
// echo $sum;


// №4
// Вывести на экран только те числа, котор. нач. на 1,2, или 5
// $arr = [10, 20, 30, 50, 235, 3000, 5405, 22435];

// foreach ($arr as $value) {
// 	$str = (string) $value;
// 	if ($str[0] == 1 || $str[0] == 2 || $str[0] == 5) {
// 		echo $str. '<br>';
// 	}
// }


// №5
// Составьте массив дней недели. 
// С помощью цикла foreach выведите все дни недели
// а выходные дни выведите жирным.

// $arr = ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];

// foreach ($arr as $value) {
// 	if ($value == 'сб' || $value =='вс') {
// 		echo '<b>' . $value . '</b>' . '<br>';
// 	} else {
// 		echo $value . '<br>';
// 	}
// }


// №6
// С помощью цикла foreach выведите все дни недели, 
// а текущий день выведите курсивом
// Номер текущего дня должен храниться в переменной $day.

// $arr = ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];

// foreach ($arr as $value) {
// 	$day = 'вт';
// 	if ($value == $day) {
// 		echo '<i>'. $day . '</i>' . '<br>';
// 	} else {
// 		echo $value . '<br>';
// 	}
// }



//****** ЦИКЛ WHILE В PHP 117\147 *****// ✓

// Цикл нужен для того, чтобы:
// Выполнять опр. участок кода, заданное кол-во раз(сколько нужно).

// Цикл WHILE (ПОКА), выполняется пока:
// истинно выражение, переданное ему параметром.

// Каждый проход цикла называется - итерацией
// $i - выступает в качестве счётчика цикла.

// №1
// Выведите на экран числа от 1 до 100.
// $i = 1;

// while ($i < 100) {
// 	echo $i . '<br>';
// 	$i++;
// }



//****** БОЛЕЕ СЛОЖНЫЙ ЦИКЛ WHILE В PHP 118\147 *****// ✓	

// К счётчику можно прибавлять не только "1", но и 2 и 3 итд

// Выведите на экран нечетные числа в промежутке от 0 до 99.

// $i = 1;
 
// while ($i < 100) {
// 	if ($i % 2 != 0) {
// 	echo $i . '<br>';
// 	}
// 	$i++;
// }



//****** ОБРАТНЫЙ ОТСЧЕТ В ЦИКЛЕ WHILE В PHP 119\147 *****// ✓

// Счётчик может не только увеличиваться, но и уменьшаться:

// Выведите на экран числа от 30 до 0.

// $i = 30;

// while ($i >= 0) {
//	echo $i . '<br>';
//	$i--;
// }



//** ОШИБКИ НАЧИНАЮЩИХ ПРИ РАБОТЕ С ЦИКЛОМ WHILE В PHP 120\147 **// ✓

// Исправленный скрипт программиста:

// $i = 1;

// while ($i <= 10) {
// 	echo $i . '<br>';
// 	$i++;			// программист не указал шаг (цикл стал беск.)
// }				// т.к $i всегда была меньше 10 и без шага - беск.



//****** ЗАБЫТОЕ УВЕЛИЧЕНИЕ СЧЕТЧИКА WHILE В PHP 121\147 *****// ✓

// Ошибка в том, что $i = 10
// 10 всегда больше 1, поэтому цикл и бесконечный.

// $i = 10;

// while ($i >= 1) {
//	echo $i;
//	$i++;
// }



//*ПЕРЕПУТАНЫ ИНКРЕМЕНТ И ДЕКРЕМЕНТ В ЦИКЛЕ WHILE В PHP 122\147 *// ✓

// $i = 1;
 
// while ($i <= 10) {
// 	echo $i;
// 	$i--; 				// перепутал ++ и --
// }					// из-за этого бескон. цикл

// ошибка в том что $i == 0 (когда $i = 10), т.е не прав. условие.

// $i = 10;

// while ($i == 0) {	
//	echo $i;
//	$i--;
// }



//**ИЗНАЧАЛЬНО НЕВЕРНОЕ УСЛОВИЕ В ЦИКЛЕ WHILE В PHP 123\147 **// ✓

// Бывает, что как в примере выше - не верное условие.
// И цикл тоже не будет работать.
// В этом уроке задача аналогично задаче выше.



// НЕПРАВИЛЬНОЕ ПОНИМАНИЕ УСЛОВИЯ ОКОНЧАНИЯ В ЦИКЛЕ WHILE 124\147// ✓

// Исправляем ошибку программиста).
// Вывести числа от 10 до 1:

// $i = 10;

// while ($i >= 1) {
// 	echo $i;
// 	$i--;
// }



//****** ЦИКЛ FOR В PHP 125\147 *****// ✓

// Аналогичен while, за искл. того, что условия и счётчики указ. в 
// начальной строке.

// №1
// С помощью цикла for выведите на экран числа от 1 до 100:

// for ($i = 0; $i <= 100; $i++) {
// 	echo $i . '<br>';
// }

// №2
// С помощью цикла for выведите на экран числа от 11 до 33:

// for ($i = 11; $i <= 33; $i++) {
//	echo $i . '<br>';
// }

// №3
// С помощью цикла for выведите на экран 
// четные числа в промежутке от 0 до 100:

// for ($i = 0; $i <= 100; $i++) {
// 	if($i % 2 == 0) {
// 		echo $i . '<br>';
// 	}
// }

// №4
// С помощью цикла for выведите на экран 
// нечетные числа в промежутке от 1 до 99.

// for ($i = 1; $i <= 99; $i++) {
// 	if($i % 2 !== 0) {
// 		echo $i . '<br>';
// 	}
// }

// №5
// С помощью цикла for выведите на экран числа от 100 до 0.

// for ($i = 100; $i >= 1; $i--) {
// 		echo $i . '<br>';
// }



//****** НАКОПЛЕНИЕ РЕЗУЛЬТАТА В ЦИКЛЕ PHP 126\147 *****// ✓

// Когда мы перебираем числа, можем записать их сумму в перемен:
// (делали аналогичное раньше, когда работали с foreach).

// Свой пример цикла с накоплением результата:
// $res = 0;

// for ($i = 1; $i <= 10; $i++) {
// 	$res += $i;
// }
// echo $res;

// №1
// Произведение целых чисел от 1 до 20:
// $res = 1;
// for ($i = 1; $i <= 20; $i++) {
// 	$res *= $i;
// }
// echo $res;

// №2
// суммa четных чисел от 2 до 10:
// $res = 0;
// for ($i = 2; $i <= 10; $i++) {
// 	if ($i % 2 == 0) {
// 		$res += $i;
// 	}
// }
// echo $res;

// №3
// Найдите сумму нечетных чисел от 1 до 9:
// $res = 0;
// for ($i = 1; $i <= 9; $i++) {
// 	if ($i % 2 != 0) {
// 		$res += $i;
// 	}
// }
// echo $res;



//****** СОКРАЩЕННЫЙ СИНТАКСИС ЦИКЛОВ В PHP 127\147 *****// ✓

// {} - можно убрать при записи цикла
// однако так делать нельзя! во избежании доп.ошибок.



//****** ОБЩИЙ СИНТАКСИС ЦИКЛА FOR В PHP 128\147 *****// ✓

// Начальные параметры (или команды) цикла
// Могут состоять из нескольких команд:

// for ($i = 0, $j = 0;   $i <= 9;   $i++, $j +=2) {
// 		echo $i . ' ' . $j . '<br>';	
// }



//****** ИНСТРУКЦИЯ BREAK В PHP 129\147 *****// ✓

// Инструкция break может завершать любые циклы: foreach, for, while

// Испол. в случае когда, необходимо прервать цикл на опред. моменте
// Чтобы не расходовать ресурсы процессора.

// $arr = [1, 2, 3, 4, 5];

// foreach ($arr as $elem) {
//	if ($elem == 3) {
//		echo 'есть';
//		break; // выйдем из цикла
//	}
// }


// №1
// Дан массив с числами. Запустите цикл, который будет по очереди 
// выводить элементы этого массива в консоль до тех пор, 
// пока не встретится элемент со значением 0. 
// После этого цикл должен завершить свою работу.

// $arr = [1, 2, 3, 4, 5, 0, 4];

// foreach ($arr as $elem) {
// 	if ($elem == 0) {
// 		echo "Упс! текущее знач - $elem";
// 		break;
// 	}
// }
 

// №2
// Дан массив с числами. Найдите сумму элементов
// расположенных от начала массива до первого отрицательного числа.

// $sum = 0;
// $arr = [1, 2, 3, -4, 5, 0, 4];

// foreach ($arr as $elem) {
// 	if ($elem > 0) {
// 		$sum += $elem;
// 	} else {
// 		echo 'остановочка! сумма: ' . $sum;
// 		break;
// 	}
// }


// №3
// Дан массив с числами. Найдите позицию первого числа 3 в массиве 
// (считаем, что это число обязательно есть в массиве).

// $arr = [1, 2, 3, -4, 5, 0, 4];

// foreach ($arr as $key => $elem) {
// 	if ($elem == 3) {
// 		echo $key;
// 	}
// }


// №4
//Определите, сколько целых чисел
//Начиная с числа 1, нужно сложить, чтобы сумма получилась больше 100

// $sum = 0;
// for ($i = 1; $sum < 100; $i++) {
// 	if ($sum < 100) {
// 		$sum += $i;
// 	}
// }
// 	echo $i . '<br>';



//****** ИНСТРУКЦИЯ CONTINUE В PHP 130\147 *****// ✓

// continue - запускает новую итерацию цикла.

// $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
 
// foreach ($arr as $elem) {
// 	if ($elem % 2 === 0) {
// 		$res = $elem * $elem;
// 	} elseif ($elem % 3 === 0) {
// 		$res = $elem * $elem * $elem;
// 	} else {
// 		continue; // перейдем на новую итерацию 
// 			цикла 
// 	}
	
// 	echo $res; // выполнится, если делится 
// 		на 2 или 3 
// }



//****** РАБОТА С ФЛАГАМИ($flag) В PHP 131\147 *****// ✓

// $flag - специальная переменная, которая принимает true/false.
// С пом. Флаг можно проверить наличие чего-либо, где-либо.



//****** ПРОВЕРЯЕМ НАЛИЧИЕ ЭЛЕМЕНТА МАССИВА В PHP 132\147 *****// ✓

// Массив с числами. Нужно проверить есть ли в нём элемент со знач. 3
// Если есть - выведем его:

// $arr = [1, 2, 3, 4, 5, 6, 3, 8, 9];

// foreach ($arr as $elem) {
// 	if ($elem == 3) {
// 		echo 'есть ' . $elem;
// 		break;		// завершим цикл (выведем знач. 3 один раз)
// 	}
// }

// * Но тут есть нюансы - во первых 1 "if"(проверка только на налич).
// * Второй - else, не будет корректно выводить что "эл. нет"
// 	 поэтому нет смысла его писать.



//*** ПРОВЕРЯЕМ ОТСТУТСТВИЕ ЭЛЕМЕНТА МАССИВА В PHP 133\147 ***// ✓

// Сделаем так, чтобы если эл "а" есть в массиве, то мы выводим:
// "Эл. а - есть в массиве", а если нет - "эл. а - нет в массиве":

// Сделаем с пом. $flag:
// $arr = ['a', 'b', 'c', 'd', 'e'];

// $flag = false; // flag опущен

// foreach ($arr as $elem) {
// 	if ($elem == 'a') {
// 		$flag = true;   // подымаем flag	
// 	}
	
// 	if ($flag == true) {
// 		echo 'элемент \'a\' есть в массиве!' . '<br>';
// 	} else {
// 		echo 'элемента \'a\' в массиве - нет' . '<br>';
// 	}
// }



// ПРОИЗВОЛЬНОЕ КОЛИЧЕСТВО ИТЕРАЦИЙ В ЦИКЛЕ WHILE В PHP 134\147 // ✓

// Задача:
// $num=5, умножайте на 3 столько раз пока рез-тат не станет 1000.
// Посчитайте кол-во итераций, для этого.

// $num = 5;
// $i = 0;
// while ($num < 1000) {
// 	$num = $num * 3;	// 
// 	$i++;				// считаем кол-во итераций
// }
 
// echo $num . '<br>';
// echo $i;



// ПРОИЗВОЛЬНОЕ КОЛИЧЕСТВО ИТЕРАЦИЙ В ЦИКЛЕ FOR БЕЗ ТЕЛА 135\147 // ✓

// Решим предыдущую задачу с пом. цикла "for" без тела т.е "{}":

// for ($i = 0, $num = 5; $num < 1000; $num = $num * 3, $i++);
// echo 'Результат умн. на 3: ' . '<b>' . $num . '</b>' . '<br>' . 
// 'число итераций: ' . '<b>' .  $i . '</b>';



// ФОРМИРОВАНИЕ СТРОК ЧЕРЕЗ ЦИКЛЫ В PHP 136\147 // ✓

// Строки формируются также как и с накоплением суммы
// Только вместо $sum = 0 . Записываем ($str = '';) 
// $str = ''; и записываем при каждой итерации новое "слово":

// $str = '';
// for ($i = 0; $i < 5; $i++) {
//	$str .=  ' word';	
// }
// echo $str;



// ** ФОРМИРОВАНИЕ СТРОК С ЦИФРАМИ ЧЕРЕЗ ЦИКЛЫ В PHP ** 137\147 // ✓

// В задаче выше, сделаем не 5 word. А строку '12345'.
// Напишем в теле цикла: "$str .= $i;"

// № 1
// С пом. цикла сформ. str '123456789' и записать ее в перемен $str.
// Вывести знач. этой перемен. на экран.

// $str = '';
// for ($i = 1; $i < 10; $i++) {
// 	$str .= $i;
// }
// echo $str;


// № 2
// С пом. цикла сформ. str '987654321' и записать ее в перемен $str.
// Вывести знач. этой перемен. на экран.

// $str = '';
// for ($i = 9; $i >= 1; $i--) {
// 	$str .= $i;
// }
// echo $str;


// № 3
// С пом. цикла сформ. str '-1-2-3-4-5-6-7-8-9-' 
// и записать ее в перемен $str.
// Вывести знач. этой перемен. на экран. 

// $str = '';
// for ($i = -1; $i >= -9; $i--) {
// 	$str .= $i;
// }
// echo $str . '-';



//****** ВЛОЖЕННЫЕ ЦИКЛЫ В PHP 138\147 *****// ✓

// Если мы хотим вывести к примеру:
// "111222333444555666777888999"

// то тут нужен вложен. цикл
// 1й цикл будет перебирать числа от 1 до 9 (123456789)
// 2й цикл будет повторять эти числа по 3 раза:

// for ($i = 1; $i <= 9; $i++) {
// 	for ($j = 1; $j <= 3; $j++) {
// 		echo $i;	//111222333444555666777888999
// 	}
// }

// У счётчиков должны быть названия: $i, $j, $k;

// №1
// С помощью двух вложенных циклов выведите на экран следующую строку:
// 111222333444555666777888999

// for ($i = 1; $i <= 9; $i++) {// 123456789 передаем вниз до след ит.
// 	for ($j = 1; $j <= 3; $j++) {// 111222333444555666777888999
// 		echo $i;				
// 	}
// }

// №2
// С помощью двух вложенных циклов выведите на экран следующую строку:
// 11 12 13 21 22 23 31 32 33:

// for ($i = 1; $i <= 3; $i++) {
// 	for ($j = 1; $j <= 3; $j++) {	  
// 		echo $i . $j . ' '; 		
// 	}
// }

// Берём сначала $i, прогоняем через 1-й цикл:
// $i = 1 2 3
// Переходим к 2-му циклу и прогоняем через него:
// (т.е сначала 1, потом 2, потом 3)
// $i = 111 222 333;

// Теперь к $j и прогоняем через 2й цикл:
// $j = 123
// Переходим к 1-му циклу и прогоняем через него:
// $j = 123 123 123 

// Теперь просто объединяем через " . " :
// 11 12 13 21 22 23 31 32 33

// * $i = 111 222 333; Получаем, поскольку в 1й цикл вложен 2й цикл *
// * И тут принцип работы как в if: *
// * 1. Берем 1, 1 подходит и второй цикл дублирует 3 раза "111" *
// * 2. Берем 2, 2 подходит и второй цикл дублирует 3 раза "222" * итд

// * Но когда мы начинаем работу с $j (2-м циклом) *
// * В него ничего не вложено. Он просто отрабатывает и возвр."123" *
// * Но внеший(1й) цикл сущест. и видит что ему вернули знач. "123" *
// * В соотв. со своими усл. он делает 3 итерации т.е 3 раза по"123" *



//****** ЗАПОЛНЕНИЕ МАССИВОВ В PHP 139\147 *****// ✓

// Можно заполнять массив так:
// $arr = [];
// $arr [] = 1;
// $arr [] = 2;
// или по стандарту: $arr = [1, 2, 3, 4, 5];

// Объявите пустой массив, а затем заполните его числами от 1 до 10:

// $arr = [];
// for ($i = 1; $i <= 10; $i++) {
// 	$arr[] = $i;
// }
// var_dump($arr);


// Объявите пустой массив, а затем заполните его 5-ю буквами "x":

// $array = [];
// $str = '';
// for ($j = 1; $j <= 5; $j++) {
// 	$str .= 'x';
// }
// $array[] = $str;
// var_dump($array);


// или короче :
// $array = [''];
// 
// for ($j = 1; $j <= 5; $j++) {
//  $array[0] .= 'x';
// }
// var_dump($array);



//****** ЗАПОЛНЕНИЕ МАССИВОВ ЧЕРЕЗ ЦИКЛ FOR В PHP 140\147 *****// ✓

// С помощью цикла заполните массив числами от 1 до 100:
// $num = [];
// for ($i = 1; $i <= 100; $i++) {
// 	$num[] = $i;
// }
// var_dump($num);
 
// С помощью цикла заполните массив нечетными числами 
// в промежутке от 1 до 99:
// $num = [];
// for ($i = 1; $i <= 99; $i++) {
//	if ($i % 2 != 0) {
//		$num[] = $i;	
//	}
// }
// var_dump($num);



//****** ЦИКЛ FOR ДЛЯ МАССИВОВ В PHP 141\147 *****// ✓ 

// Переберем индексный массив с пом. цикла "for":
// (Это можно сделать только с индексным массивом)
// $arr = [1, 2, 3, 4, 5];
// $length = count($arr); // для перебора установим длину массива

// for ($i = 0; $i <= $length; $i++) { // переберем(перепишем) $arr
// 	echo $arr[$i];					// в соотв. с его $lenght
// }								// и выведем его


// С помощью цикла for выведите все эти элементы на экран.
// $arr = ['a', 'b', 'c', 'd', 'e'];
// $length = count($arr);

// for ($i = 0; $i < $length; $i++) {
// 	echo $arr[$i];
// }



//****** ПРИМЕНЕНИЕ ЦИКЛА FOR ДЛЯ МАССИВОВ В PHP 142\147 *****// ✓ 

// С помощью цикла for выведите на экран 
// все элементы этого массива, кроме последнего.

// $arr = ['a', 'b', 'c', 'd', 'e'];
// $length = count($arr);
// 
// for ($i = 0; $i < ($length - 1); $i++) {
// 	echo $arr[$i];
// }


// С помощью цикла for выведите на экран 
// первую половину элементов этого массива.

// $arr = [1, 2, 3, 4, 5, 6, 7, 8];
// $length = count($arr);
 
// for ($i = 0; $i < ($length / 2); $i++) {
// 	echo $arr[$i];
// }



//**ОШИБКА ПРИ ПРИМЕНЕНИИ ЦИКЛА FOR ДЛЯ МАССИВОВ В PHP 143\147**// ✓

// Опред. сумму элементов массива с пом. for
// И выведите ее на экран

// $arr = [1, 2, 3, 4, 5, 6, 7, 8];
// $length = count($arr);
// $sum = 0;
// for ($i = 1; $i < $length; $i++) {
// 	$sum += $arr[$i];
// }
// echo $sum;



//****** ИЗМЕНЕНИЕ МАССИВА В ЦИКЛЕ FOR PHP 144\147 *****// ✓

// $arr = [1, 2, 3, 4, 5];
// $length = count($arr);
// $res = 1;
// В массиве $arr с пом. цикла for,
// Увеличим каждый элемент в 2 раза:

// for ($i = 0; $i < $length; $i++) {
// 	$arr[$i] = $arr[$i] * 2;
// } 
// var_dump($arr);

// Теперь по ДЗ возведем всё в квадрат:

// for ($i = 0; $i < $length; $i++) {
// 	$arr[$i] *= $arr[$i];
// }
// var_dump($arr);


// СОКР. ОПЕРАЦИИ ДЛЯ ИЗМЕНЕНИЯ МАССИВА В ЦИКЛЕ FOR PHP 145\147 // ✓

// При изм. в массивах можно исп-ть сокр. операции
// Применяя их прямо к эл-ту массива
// Увеличим каждый элемент массива на 1 ед. исп. ++

// $arr = [1, 2, 3, 4, 5];
// $length = count($arr);
 	
// for ($i = 0; $i < $length; $i++) {
// 	$arr[$i]++;
// }
// var_dump($arr);

// Увеличим каждый элемент массива на 5  исп. +=

// for ($i = 0; $i < $length; $i++) {
// 	$arr[$i]+=5;
// }
// var_dump($arr);
 
// Отнимем у каждого элемента единицу:

// for ($i = 0; $i < $length; $i++) {
// 	$arr[$i]-=1;
// }
// var_dump($arr);

// Прибавим 10:

// for ($i = 0; $i < $length; $i++) {
// 	$arr[$i]+=10;
// }
// var_dump($arr);



//****** ПРАКТИКА НА МАССИВЫ В ЦИКЛЕ В PHP 146\147 *****// ✓

// №1
// Дан следующий массив с работниками и их зарплатами:
// Увеличьте зарплату каждого работника на 10%


// №2
// Модиф. задачу так, чтобы з\п увелич. только тем
// У кого она меньше или равна 400: 

// $arr = [
// 	'employee1' => 100,
// 	'employee2' => 200,
// 	'employee3' => 300,
// 	'employee4' => 400,
// 	'employee5' => 500,
// 	'employee6' => 600,
// 	'employee7' => 700
// ];
 
// $e = 'employee';
// $length = count($arr);

// for ($i = 1; $i <= $length; $i++) {
// 	if ($arr[$e.$i] <= 400) {
// 		$arr[$e.$i] = $arr[$e.$i] + ($arr[$e.$i] / 10);
// 	}
// }
// var_dump($arr);	


// №3
// Найдите сумму ключей этого массива 
// и поделите ее на сумму значений:

// $arr = [1 => 6, 2 => 7, 3 => 8, 4 => 9, 5 => 10];

// $length = count($arr); 	// кол - во эл-тов в массиве: 5;
// $sumV = 0;
// $sumK = 0;
// for ($j = 6, $i = 1; $i <= $length; $i++, $j++) {
// 	$arr[$i]= $j . '<br>';
// 	$sumV += $j;
// 	$sumK += $i;
// }

// echo $sumK . '<br>';
// echo $sumV . '<br>';
// echo $res = $sumV / $sumK;


// №4
// Запишите ключи этого массива в один массив, 
// а значения - в другой:

// $arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

// $arrForKey = [''];
// $arrForElem = [''];

// foreach ($arr as $key => $elem) {
// 	$arrForKey[] = $key;
// 	$arrForElem[] = $elem;
// }

// var_dump($arrForKey);
// var_dump($arrForElem);


// №5
// Дан следующий массив:

// $arr = [
// 	1 => 125,
// 	2 => 225,
// 	3 => 128,
// 	4 => 356,
// 	5 => 145,
// 	6 => 281,
// 	7 => 452,
// ];

// Запишите в новый массив элементы, значение которых начинается 
// с цифры 1 или цифры 2. 
// То есть у вас в результате получится вот такой массив:

// $res = [
// 	125,
// 	225,
// 	128,
// 	145,
// 	281,
// ];

// $new = [];

// foreach ($arr as $key => $elem) {
//	$str = (string )$elem;
//	if ($str[0] == 2 || $str[0] == 1) {
//		$new [] = $str; 
//	}
// }
// var_dump($new);



//****** ОТРАБОТКА ЦИКЛОВ РНР 147\147 *****// ✓

// №1
// Выведите с помощью цикла столбец чисел от 1 до 100.
// for ($i = 1 ; $i <= 100; $i++) {
// 	echo $i . '<br>';
// }

// №2
// Выведите с помощью цикла столбец чисел от 100 до 1.
// for ($i = 100 ; $i >= 1; $i--) {
// 	echo $i . '<br>';
// }

// №3
// Выведите с помощью цикла столбец четных чисел от 1 до 100.
// for ($i = 1 ; $i <= 100; $i++) {
// 	if ($i % 2 == 0) {
// 		echo $i . '<br>';
// 	}
// }

// №4
// Заполните массив 10-ю иксами с помощью цикла.
// $arr = [''];
// for ($i = 1 ; $i <= 10; $i++) {
// 	$arr[] = 'x';
// }
// var_dump($arr);

// №5
// Заполните массив числами от 1 до 10 с помощью цикла:
// (в массив записываем значения! ключи генер. авт-ки т.к он индекс.)
// $arr[] = '';
// for ($i = 1; $i <= 10; $i++) {
// 	$arr[] = $i;
// }
// var_dump($arr);
// Для примера:
// $arr['year'] = 2024;
// var_dump($arr);

// №6
// Дан массив с числами. С помощью цикла выведите только те элементы 
// массива, которые больше нуля и меньше 10-ти.
// $arr = [33, 2, 13, 4, 12];
// foreach ($arr as $elem) {
// 	if ($elem > 0 && $elem < 10) {
// 		echo $elem . '<br>';
// 	}
// }

// №7
// С помощью цикла проверьте, что в нем есть элемент со значением 5.
// $arr = [4, 212, 25, 1, 12];
// $length = count($arr);
// $flag = false;
// foreach ($arr as $key => $elem) {
// 	if ($elem == 5) {
// 		$flag = true;
// 		break;
// 	} 
// }	
// if ($flag == true) {
// 	echo "Текущий элемент - $elem ! Значит, он найден!";
// } else {
// 	echo 'Элемент 5 - не найден!';
// }

// №8
// Дан массив с числами. 
// С помощью цикла найдите сумму элементов этого массива.
// $arr = [4, 2, 5, 1, 2];
// $sum = 0;
// $length = count($arr);
// for ($i = 0; $i < $length; $i++) {
// 	$sum += $arr[$i];
// }
// echo $sum;

// №9
// Дан массив с числами.
// С помощью цикла найдите сумму квадратов элементов этого массива.
// $arr = [4, 2, 5, 1, 2];
// $length = count($arr);
// $sum = 0;
// for ($i = 0; $i < $length; $i++) {
// 	$sum += $arr[$i] ** 2;
// }
// 	echo $sum;

// №10
// Дан массив с числами. Найдите среднее арифметическое 
// его элементов (сумма элементов, делить на количество).
// $arr = [4, 2, 5, 1, 2];
// $length = count($arr);
// $sum = 0;
// $arifmetic = 0;
// for ($i = 0; $i < $length; $i++) {
// 	$sum += $arr[$i];
// 	$arifmetic = $sum / $length;
// }
// 	echo $arifmetic

// №11
// Напишите скрипт, который будет находить факториал числа. 
// Факториал - это произведение всех целых чисел, 
// меньше данного, и его самого.
// (произведение всех натуральных чисел от 1 до данного числа)
// (факториал 5 = 1 * 2 * 3 * 4 * 5)
// $factorial = 1;
// $num = 3;
// for ($i = 1; $i <= $num; $i++) {
// 	$factorial *= $i;
// }
// echo $factorial;
?>