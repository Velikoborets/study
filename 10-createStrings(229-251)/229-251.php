<?php

/**  ВСТАВКА ПЕРЕМЕННЫХ В СТРОКИ В PHP 229/251 ✓ **/

// " " - исполняют код (подставится значение переменных)
// ' ' - просто строка

# ДЗ (вставка перем. в строки)
# 1
# Упрощаем код с пом. " " :
# $name = 'user';
# echo "hello $name !";



/**  ВСТАВКА ЭЛЕМЕНТОВ МАССИВА В PHP 230/251 ✓ **/

// можно также выполнять вставку элементов массива в " ".
// $arr = ['1', '2', '3'];
// echo "я намбер $arr[0] ееее";



/**  ВСТАВКА ЭЛЕМЕНТОВ АССОЦИАТИВНЫХ МАССИВОВ В PHP 231/251 ✓ **/

// для вставки элементов ассоц. $arr их надо обернуть в {} :
// $arr = ['a'=>1, 'b'=>2, 'c'=>3];
// echo "xxx {$arr['a']} yyy";

// либо снять одинарные кавычки с ключа при вставке:
// $arr = ['a'=>1, 'b'=2, 'c'=3];
// echo "xxx $arr[a] yyy";

// либо тупо записать эл-т массива в переменную:
// $arr = ['a', 'b', 'c'];
// $elem = $arr['a'];

# ДЗ (вставка элементов ассоциативных массивов):
# $arr = ['a' => 1, 'b' => 2, 'c' => 3];
# echo "text {$arr['a']} text {$arr['b']} text";
# или
# $arr = ['a' => 1, 'b' => 2, 'c' => 3];
# $elemA = $arr['a'];
# $elemB = $arr['b'];
# echo "text $elemA text $elemB text";



/**  ЦИКЛ И ВСТАВКА ПЕРЕМЕННЫХ В PHP 232/251 ✓ **/

// вставку переменных в строки можно проделывать в циклах:
// for ($i = 1; $i <= 5; $i++) {
// echo "x $i y";
// x 1 yx 2 yx 3 yx 4 yx 5 y
// }

# ДЗ (Цикл и вставка перемен. в РНР):
# for ($i = 1; $i <= 10; $i++) {
#    for ($j = 1; $j <= 10; $j++) {
#        echo "nums: $i $j <br>";
#    }
# }



/**  ВСТАВКА ЭЛЕМЕНТОВ МАССИВОВ В ЦИКЛЕ В PHP 233/251 ✓ **/

// можем вставлять эл-ты, при переборе массива циклом:
// $arr = [1, 2, 3, 4, 5];
// foreach ($arr as $elem) {
//    echo "xxx $elem yyy";
// }

# ДЗ (Вставка эл-тов массивов в цикле):
# 1. Упростить код:
# $arr = ['a' => 1, 'b' => 2, 'c' => 3];
# foreach ($arr as $key => $elem) {
#	echo "pair: $elem $key <br>";
# }



/* ВСТАВКА ЭЛЕМЕНТОВ МНОГОМЕРНЫХ МАССИВОВ В ЦИКЛЕ В PHP 234/251 ✓ */

// Прим1.
// Есть массив. Переберем его циклом и сф-ем строки из его эл-ов.

// $users = [
//    [
//        'name' => 'user1',
//        'age'  => 30,
//    ],
//    [
//        'name' => 'user2',
//        'age'  => 31,
//    ],
//    [
//        'name' => 'user3',
//        'age'  => 32,
//    ],
// ];

// foreach ($users as $elem) {
//    echo "$elem[name]: $elem[age] <br>";
// }

# ДЗ (аналогично примеру).



/**  ГЕНЕРАЦИЯ ТЕГОВ В PHP 235/251 ✓ **/

// научимся формировать теги с исп. переменных:
// $text = 'fff';
// echo "<p> $text </p>";

# ДЗ (генерация тегов):
# выведите каждую из этих перем. в отд. обзаце:

# $text1 = 'aaa';
# $text2 = 'bbb';
# $text3 = 'ccc';

# $arr = [$text1, $text2, $text3];
# foreach ($arr as $elem) {
#	echo "$elem <br>";
# }



/** ГЕНЕРАЦИЯ ТЕГОВ С АТРИБУТАМИ В PHP 236/251 ✓ **/

// Задача: сделать ссылку, при этом текст и адрес ссылки будут
// хранится в соотв. переменных.

// $text = 'link';
// $href = 'index.html';
// просто исп. экранирование \ для кавычек \"\"
// echo "<a href=\"$href\">$text</a>";


# ДЗ (генерация тегов с атрибутами):
# вывести 3 картинки

# $src1 = '1.png';
# $src2 = '2.png';
# $src3 = '3.png';

# $arr = [$src1, $src2, $src3];
# foreach ($arr as $elem) {
# 	echo "<img src=\"$elem\" alt=\"images\"> <br>";
# }



/** ЦИКЛ И ГЕНЕРАЦИЯ ТЕГОВ В PHP 237/251 ✓ **/

# ДЗ (цикл и генерация тегов в php):
# С пом. цикла сформ. следующий HTML код:

# <ul>
#	<li>1</li>
#	<li>2</li>
#	<li>3</li>
#	<li>4</li>
#	<li>5</li>
# </ul>


# echo "<ul>";
# for ($i = 1; $i <= 5; $i++) {
#	echo "<li>$i</li>";
# }
# echo "</ul>";




/** ЦИКЛ И ГЕНЕРАЦИЯ ТЕГОВ ИЗ МАССИВОВ В PHP 238/251 ✓ **/

# ДЗ (Цикл и генерация тегов из массивов в РНР):

# $arr = ['text1', 'text2', 'text3'];
# Сформируйте с его помощью следующий HTML код:

# <select>
#	<option>text1</option>
#	<option>text2</option>
#	<option>text3</option>
# </select>

# echo "<select>";
# foreach ($arr as $text) {
#	echo "<option>$text</option>";
# }
# echo "</select>";



/** ЦИКЛ И ГЕНЕРАЦИЯ ТЕГОВ И АТРИБУТОВ В PHP 239/251 ✓ **/

# 1 

# Cформировать приведенный ниже html код:
# <ul>
# 	<li><a href="page1.html">text1</a></li>
# 	<li><a href="page2.html">text2</a></li>
# 	<li><a href="page3.html">text3</a></li>
# </ul>

# Решение:

# $arr = [
# 	['href'=>'page1.html', 'text'=>
# 		'text1'], 
# 	['href'=>'page2.html', 'text'=>
# 		'text2'], 
# 	['href'=>'page3.html', 'text'=>
# 		'text3'], 
# ];

# echo "<ul>";
# 	foreach ($arr as $elem) {
# 		echo "<li><a href=\"$elem[href]\">$elem[text]</a></li>";
# 	}
# echo "</ul>";


# 2

# Сформировать, приведенный ниже html - код
# <select>
# 	<option value="1">text1</option>
# 	<option value="2">text2</option>
# 	<option value="3">text3</option>
# </select>

# $arr = [
#	['value' => '1', 'text' => 'text1'],
#	['value' => '2', 'text' => 'text2'],
#	['value' => '3', 'text' => 'text3'],
# ];
	
# echo "<select>";
# 	foreach ($arr as $elem) {
# 		echo "<option value=\"$elem[value]\">$elem[text]</option>";
# 	}
# echo "</select>";



/** ЦИКЛ И ГЕНЕРАЦИЯ HTML ТАБЛИЦ НА PHP 240/251 ✓ **/

# Сформировать:

# <table>
# 	<tr>
# 		<tr>
# 			<td>user1</td>
# 			<td>30</td>
# 			<td>500</td>
# 		</tr>
# 		<tr>
# 			<td>user2</td>
# 			<td>31</td>
# 			<td>600</td>
# 		</tr>
# 		<tr>
# 			<td>user3</td>
# 			<td>32</td>
# 			<td>700</td>
# 		</tr>
# 	</tr>
# </table>

$arr = [
	['name' => 'user1', 'age' => 30, 
		'salary' => 500], 
	['name' => 'user2', 'age' => 31, 
		'salary' => 600], 
	['name' => 'user3', 'age' => 32, 
		'salary' => 700], 
];


