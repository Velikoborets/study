
<?php

/***** РАБОТА С РЕКУРСИЕЙ В PHP 179/184 *****/ ✓

// $a = 1;
// function func($a) {
// 	$a = 1; // тут ей не место! будет всегда "2"
// 	echo $a;
// 	$a++;
// 	if ($a <= 10) {
// 		func($a); 	 // переходим на новую "итерацию"
// 	}
// }
// func($a);

// тут происходит переполнение "стека" и будет 256 "222"(двоек)
// т.к в if всегда будет попадать 1 + $i++ (т.е 1) = "2"

// Рекурсия основывается на стеке - а стек как магазин АК - 47.
// в нем только 256 мест для патронов (функций).
// (стек - это кол-во исполняемых функций в О.П).

// И если мы его переполняем то будет ошибка 
// (лишний патрон вставить не возможно).

// Поэтому перемен $a надо вывести из фу-ии (сделать глобал)
// тогда все заработает!



/***** РЕКУРСИЯ С ПАРАМЕТРОМ В PHP 180/184 *****/ ✓

// C помощью рекурсии последовательно выведем элементы массива;

// $arr = [1, 2, 3];

// function valueArr($arr) {	

// 	$firstElem = array_shift($arr);
// 	var_dump($firstElem);

// 	$length = count($arr);
// 	if ($length != 0) {
// 		valueArr($arr);
// 	}
// }
// valueArr($arr);	// 1  2  3 (каждое число - отдельное int)

// Ставим условия выхода из рекурсии: 
// Пока длина массива не будет равна 0
// Мы вырезаем с пом. array_shift, последовательно каждый эл.arr
// И с помощью var_dump();
// Последовательно выводим его каждый эл. в виде int числа.

// ДЗ(рекурсия с параметром в РНР):

// №1
// С помощью рекурсии выведите элементы этого массива на экран
// $arr = ['a' => 1, 'b' => 2, 'c'=> 3, 'd' => 4, 'e' => 5]; 
// function returnArray($arr){
// 	$cut = array_shift($arr);
// 	var_dump($cut);
// 	$length = count($arr);
// 	if ($length !== 0) {
// 		returnArray($arr);
// 	}
// }
// returnArray($arr);



/*** СУММА ЭЛЕМЕНТОВ МАССИВА ПРИ РЕКУРСИИ В PHP 181/184 ***/ ✓

// ДЗ (сумма элементов массива):

// $arr = ['a' => 1, 'b' => 2, 'c'=> 3, 'd' => 4, 'e' => 5]; 

// function returnArray($arr){

// 	$cut = array_shift($arr);
// 	$length = count($arr);
	
// 	if ($length !== 0) {
 		// суммируем результат рекурсии в 1 элемент
// 		$cut += returnArray($arr);
// 	}
		// возвращаем результат рекурсии
// 	return $cut;
// }
// var_dump(returnArray($arr));

 

/*** РЕКУРСИЯ И МНОГОМЕРНЫЕ СТРУКТУРЫ В PHP 182/184 ***/ ✓

// Например у нас есть arr (который напоминает структуру папок):

// $arr = [
// 	1, [2, 7, 8],
// 	[3, 4, [5, [6, 7] ],
// 	]
// ];

// У него сложная структура и произвол. уровни вложенности.
// Если мы хотим вывести все примитивные эл-ты массива, то
// У нас не получится использовать цикл
// т.к у массива не строго-иерархичная структура.

// Поэтому в таком случае лучше использовать рекурсию:

// function myFunc($arr) {
// 	foreach ($arr as $elem) {
// 		echo $elem;
// 	}
// }
// myFunc($arr); // выведет 1, arr, arr  и 2 нотайса

// Чтобы избежать нотайсов и перебрать влож. массив мы -
// Укажем, что есть элементы-примитивы и элементы массивы:

// И на выводе будет "1" - т.е только примитивное значение

// Поскольку:
// В if после проверки на массив.
// Не указано, что делать с 2-мя массивами-элементами.
// И мы вызовем в if - рекурсию func($elem).
// И теперь если наш элемент массив. Фу-я вызывает сама себя
// Передавая параметром этот массив. И выводя его элементы.

// function func($arr) {
// 	foreach ($arr as $elem) {
// 		if (is_array($elem)) {
// 			func($elem);
// 			// элемент - массив
// 		} else {
// 			// элемент - примитив
// 			echo $elem;
// 		}
// 	}
// }
// func($arr);


// ДЗ (Рекурсия и многомерные структуры в PHP):
// С помощью рекурсии выведите все 
// примитивные элементы этого массива на экран.

// $arr = [1, 2, 3, [4, 5, [6, 7]], 
// [8, ['piska', 'zhopa']]];

// function backElement($arr) {
// 	foreach ($arr as $elem) {
// 		if (is_array($elem)) {
// 			backElement($elem);
// 		} else {
// 			echo $elem . '<br>';
// 		}
// 	}
// }
// backElement($arr);



/*** СУММА ЭЛЕМЕНТОВ МАССИВА В PHP 183/184 ***/ ✓

// Давайте найдем сумму примитивных элементов нашего массива:

// $arr = [1, 2, 3, [4, 5, [6, 7]], 
// [8, [9, 10]]// ];

// function back($arr) {
	
	// перем. для хранения суммы примитв. эл. массива.
//	$sum = 0;
	
//	foreach ($arr as $elem) {
		
		// проверяем явл. ли тек. эл. arr
//		if (is_array($elem)) { 
		
		// если яв. то фу-я back() вызывает саму себя рекурс.
		// с этим эл. в качестве аргумента.
		// результат рекурсивного вызова прибав. к пер. $sum
//			$sum += back($elem);
//		} else {
			
		// если эл-т не яв. массивом, он просто прибав. к $sum
//			$sum +=  $elem;
//		}
//	}
	// после цикла фу-я возвр. зн. перем. $sum кот. сод.
	// $sum всех эл-тов массива
//	return $sum;
// }
// echo back($arr);	// 55


// ДЗ(Сумма элементов массива в РНР):

// №1
// C помощью рекурсии найдите сумму элементов этого массива.
// $arr = [1, 4, 3, [4, 33, [6, 3]], [8, [9, 11]]];
// function sumElem($arr) {
// 	$sum = 0;
// 	foreach ($arr as $elem) {
// 		if (is_array($elem)) {
// 			$sum += sumElem($elem);
// 		} else {
// 			$sum += $elem;
// 		}
// 	}
// 	return $sum;
// }
// echo sumElem($arr);


// №2
// Дан многомерный массив произвольного уровня вложенности, 
// содержащий внутри себя строки, например, такой.
// $arr = ['a', ['b', 'c', 'd'], ['e', 'f', ['g', ['j', 'k']]]];	
// С пом. рекурсии слейте элементы этого массива в одну строку:
// function backStr($arr) {
// 	$str = '';
// 	foreach($arr as $elem) {
// 		if (is_array($elem)) {
// 			$str .= backStr($elem);
// 		} else {
// 			$str .= $elem;
// 		}
// 	}
// 	return $str;
// }
// echo backStr($arr);



/* МАНИПУЛЯЦИИ С ЭЛЕМЕНТАМИ МНОГ-ГО МАССИВА В PHP 184/184 */ ✓

// Возведите все эл. числа этого массива в квадрат (c пом. for):

// $arr = [1, [2, 7, 8], [3, 4], [5, [6, 7]]]; 
// function func($arr) {
// 	$length = count($arr);
// 	for ($i = 0; $i < $length; $i++) { 
// 		if (is_array($arr[$i])) {
// 			$arr[$i] = func($arr[$i]);
// 		} else {
// 			$arr[$i] = $arr[$i] . '!';
// 		}
// 	}
// 	return $arr;
// } 
// var_dump(func($arr));


// №1
// Возведите все элементы-числа массива $arr в квадрат.
// function square($arr) {

// 	$length = count($arr);

// 	for ($i = 0; $i < $length; $i++) {
// если эл. яв. массивом то рекурсивно вызываем фу-ю square().
// результат ее вызова записываем в текущий элемент $arr[$i].
// соотв. при следующем проходе, эл. $arr[$i], уже не массив.
// а набор из 3х элементов 2,7,8 ну и также с др. элементами.

// 		if (is_array($arr[$i])) {
// 			$arr[$i] = square($arr[$i]);
// если элемент не массив, то по задаче, возводим его в квадрат.
// (умножаем самого на себя).
//		} else {	
//			$arr[$i] = $arr[$i] * $arr[$i];
//		}
//	}
// после завершения цикла возвращаем результат обработки $arr:
// 	return $arr;
// }
// var_dump(square($arr)); 






// *** ВЫЧИСЛЕНИЕ ФАКТОРИАЛА С ПОМОЩЬЮ РЕКУРСИИ *** :
// Факториал - произведение всех чисел до числа которое мы задали
// включая его самого т.е, факториал !3 :
// 3! = 3*2*1 = 6
// 4! = 4*3*2*1 = 24 итдф

// Таблица которая показывает как работает вычисление факториала
// с помощью рекурсии:


// $num = 5;
// start    $num     $num * fac($num-1)    ($num - 1)    СТЭК
//   1        5       5 * 4 = 20                4         20
//   2        20      20 * 3 = 60               3         60
//   3        60      60 * 2 = 120              2         120
//   4        120     120 * 1 = 120             1         120

/*
$num = 5;
function factorial ($num) {

// когда $num <= 1 фу-я должна вернуть 1, если значение не 1, то переходим дальше:
    if ($num <= 1) return 1;

// вызываем рекурсию, с уменьшением значения т.е factorial(4) итд
    return $num * factorial($num-1);
}
var_dump(factorial($num));

// Когда $num становится равным 1, выполняется условие if
// И фу-я возвращает 1. т.е по нашей таблице это 120.
// если мы этто не напишем, то она будет умножаться уже на 0, а это:



// ЕСЛИ ЖЕ МЫ УДАЛЯЕМ RETURN 1,
// фу-я "factorial($num) вовзр. 0"
// при вызове рекурсии мы factorial(4\3\2) * 0, а не на 4*3*2 итд
// соотв. при возврате значение будет 0, т.е null (пустота)

// ЕСЛИ УДАЛЯЕМ return $num * factorial($num-1);
// рекурсия не выполняется.
// фу-я проверяет ($num <= 1) и, если оно не true
// функция завершается без возвращения значения (зн null)
*/

?>