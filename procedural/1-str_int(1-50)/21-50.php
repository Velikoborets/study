
<?php

// ******** ДРОБИ В РНР 21\40 ********// ✓

// В PHP существуют и десятичные дроби.
// В них целая и дробная части отделяются друг от друга точкой:
// $a = 0.5;
// $b = 1.5;
// $c = $a + $b;
// echo $c;         // выведет 2



// ******** ОТРИЦАТЕЛЬНЫЕ ЧИСЛА В РНР 22\40 ********// ✓

//Знак минус можно писать как к числам, так и к переменным:
// $a = 21;
// $b = -$a;
// echo $b;    // выведет -21



// ******** ОСТАТОК ОТ ДЕЛЕНИЯ В PHP 23\40 ********// ✓

// Существует специальный оператор %, с помощью которого можно 
// найти остаток от деления одного числа на другое

// $a = 13;
// $b = 3;
// $c = $13 % 3;

// echo $c;  // Выведет 1



// ******** ВОЗВЕДЕНИЕ В СТЕПЕНЬ В PHP 24\40 ********// ✓

// Для возведения числа в степень 
// существует специальный оператор **

// $a = 10;
// echo $a ** 3;      // Выведет 1000



// ******* ПРИОРИТЕТ ВОЗВЕДЕНИЯ В СТЕПЕНЬ В PHP 25\40 ******// ✓

// Операция возведения в степень имеет 
// приоритет перед умножением и делением
// НО не перед скобками! ()



// ******** СТРОКИ В PHP 26\40 ********// ✓

// Строки могут быть как и в '' так и в " "



// ******** СЛОЖЕНИЕ СТРОК В PHP 27\40 ********// ✓

// Для сложения (конкатенации) строк используется оператор точка:

// $str = 'hello' . 'World'; 
// echo $str;             // 'helloWorld'

// либо:

// $str1 = 'hello';
// $str2 = 'World';

// echo $str1 . $str2;     // 'helloWorld'

// либо комбинируем (c пробелом в пустых кавычках):

// echo $str1 . ' ' . '!!';  // 'hello !!'



// ******** ПРОБЕЛЫ ПРИ СЛОЖЕНИИ СТРОК В PHP 28\40 ********// ✓

// Пишется так:  $str . ' ' . $str2;
// Или в др. случ. так :  $str . ' hello';



// ******** ДЛИНА СТРОКИ В PHP 29\40 ********// ✓

// echo strlen('abcde'); // выведет 5

// $a = 'abc de';
// echo strlen($a); // выведет 6 (пробел тоже символ)



// ******** ПРОБЛЕМА С КИРИЛЛИЦЕЙ В PHP 30\40 ********// ✓

// Когда считаем строку с кирилецей используем:
// echo mb_strlen('абвгд'); // выведет 5



// ******** РАБОТА С HTML ТЕГАМИ В PHP 31\40 ********// ✓

// Теги HTML с точки зрения PHP  обычные строки:

// echo '<b> bold </b>';
// echo '<i> italic </i>';

// $a = 'bold';
// echo '<b>' . $a . '</b>' . '<br>';

// echo '1 <br>';
// echo '2 <br>';
// echo '3 <br>';
// echo '4 <br>';
// echo '5 <br>';



// ******** АТРИБУТЫ ТЕГОВ В PHP 32\40 ********// ✓

// echo '<a href="page2.php">ссылка</a>'.'<br>';

// пусть адрес и текст хранятся в отдельных перемен:

// $href = 'page2.php';
// $text = 'ссылка';

// echo '<a href=" ' . $href . ' "> ' . $text . ' </a>';

// № 1
// С помощью тега <img> выведите на экран какую-нибудь картинку:
// echo '<img src="chelovek.jpg">';

// № 2
// С помощью тега <input> выведите на экран какую-нибудь text:
// echo '<input type="text" value="какой-нить текст">';

// № 3
// С помощью тега <textarea> выведите на экран поле ввода с text:
// echo '<textarea>textarea</textarea>';



// ******** ЛОГИЧЕСКИЕ ЗНАЧЕНИЯ В PHP 33\40 ********// ✓

// Логический тип это - либо true или false. 
// Используется, когда нужно ответить да либо нет (в ветвлении).

// $isAdult = true;     // либо false
// var_dump($isAdult);  // Выведет true

// Вывод через echo, даст либо 1 либо 0;



// ******** ЗНАЧЕНИЕ NULL В 34\40 ********// ✓

// null - обозначает "ничего";
// $test = null;
// var_dump($test);   // Выведет null



//*** АВТОМАТИЧЕСКОЕ ПРЕОБРАЗОВАНИЕ ТИПОВ В PHP В 35\40 ***// ✓

// т.к РНР - слаб.тип. ЯП, то он допускает такое:
// echo '1' + 2;   // выведет 3

// т.е приводит строки к числам.
// Аналогичноd, будет работать и для переменных.



// ******** ПРЕОБРАЗОВАНИЕ К СТРОКЕ В PHP 36\40 ********// ✓

// К строке будет аналогично:
// echo 1 . 2;    // выведет '12'

// НО если уберем пробелы и напишем так то:
// echo 1.2;      // выведет '1.2' тк это уже дробь

// А если написать так:
// echo 1 . 2;    // выведет ошибку



//*** ПРИНУДИТЕЛЬНОЕ ПРЕОБРАЗОВАНИЕ В ЦЕЛЫЕ ЧИСЛА 37\40 ***// ✓

// Делается с пом. фу-ии (int):
// $test = '123';
// var_dump((int) $test);      // int 123



//** ПРИНУДИТЕЛЬНОЕ ПРЕОБРАЗОВАНИЕ В ДРОБНЫЕ ЧИСЛА 38\40 **// ✓

// Делается с помю фу-ии (float):

// $test = '123.45'; 
// var_dump((float)$test);      // float 123.45



//**** ПРЕОБРАЗОВАНИЕ ДРОБИ К ЦЕЛОМУ ЧИСЛУ В PHP 39\40 ****// ✓

// Использование команды int для дроби приведет к тому, 
// что от дроби извлечется только целая часть: 

// $test = (int) '1.2';
// var_dump($test); // выведет 1



//******** ПРЕОБРАЗОВАНИЕ К СТРОКЕ В PHP 40\40 ********// ✓

// Можно преобразовать число к строке:
// $test = (string) 1.2;
// var_dump($test); // выведет '1.2'

// Аналогично работает и с int числами.



//******** СИМВОЛЫ СТРОКИ В PHP 41\50 ********// ✓

// У нас есть строка, каждый символ в ней имеет свой номер:
// $str = 'abcde';      // т.е а=0, b=1, c=2 итд

// echo $str[0];        // выведет а

// $test = '12bc.45';
// echo $test[2]; 		// выведет "b"
// Изменим $test[2] 
// $test[2] = '+';
 
// echo $test[2];		// выведет "+"
// Номер символа может храниться и в переменной



//******** ПОСЛЕДНИЙ СИМВОЛ СТРОКИ В PHP 42\50 ********// ✓

// Выведем посл. символ строки, не-зависимо от её длины:
// (В этом поможет фу-я strlen() - подсч. длину символов)

// $str = 'abcdsadasdasdsade';
// $last = strlen($str)-1;
// echo $str[$last];	



//************ ЦИФРЫ В СТРОКЕ НА PHP 43\50 **********// ✓

// Мы уже знаем, что строки состоят из цифр. Поэтому тут всё
// Работает аналогично, даже арифм. операции

// $str = '12345';

// echo $str[0];            // Выведет 1
// echo $str[0] + $str[1];  // Выведет 3



//******** ОБРАЩЕНИЕ К ЦИФРАМ ЧИСЛА НА PHP 44\50 ********// ✓

// Попытка получить символ числа приведет к ошибке.
// Поэтому сначала его надо преобразавать к строке:

// $n = 12345;
// $s = (string) $n; 		// Преоб. в строку
// var_dump($s);

// $res = $s[0] + $s[1] + $s[2] + $s[3] + $s[4];
// echo $res;				// 15



//** НЮАНСЫ РАБОТЫ С ОПЕРАЦИЕЙ ПРИСВАИВАНИЯ В PHP 45\50 **// ✓

// $num = 1; // объявляем переменную  записываем в нее зна. 1
// $num = $num + 2; // записываем в $num ее саму плюс 2 
// echo $num; // выведет 3



//******** СОКРАЩЕННЫЕ ОПЕРАЦИИ В PHP 46\50 ********// ✓

// $n = 1;
// $n += 3;			
// echo $n;			// 4

// Такая операция аналогично работает с точкой, и др. знаками.

// $str = 'a';
// $str .= 'b';
// $str .= 'c';

// echo $str; 		// 'abc'



//***** ОПЕРАЦИИ ИНКРЕМЕНТА И ДЕКРЕМЕНТА В PHP 47\50 *****// ✓

// $num = 0;
// $num = $num + 1; // прибавляем к переменной 1

// Аналогичная запись :

// $num = 0;
// $num = $num++; // прибавляем к переменной 1

// Аналогично будет и с "--".




//***** ПРЕФИКСНЫЙ И ПОСТФИКСНЫЙ ТИП В РНР 48\50 *****// ✓

// ПОСТфиксная - когда "num++" или "num--";
// ПРЕфиксная - когда "++num" или "--num";

// ПОСТфиксная($num++) - когда вывели ответ, а потом действие.
// Например:
// $num = 0;
// echo $num++; //выведет 0, т.к сначала ответ;
// echo $num;   //выведет 1, теперь уже действие;
 
 
// ПРЕфиксная(++$num) - когда сделали действие, потом - ответ.
// Например:
// $num = 0;
// echo ++$num;    //выведет 1, т.к сразу действие;
// echo $num;      //выведет 1, теперь уже действие;


// Как работает, для присваивания - (ПОСТФИКСНАЯ):
// $num1 = 0;
// $num2 = $num1++;

// echo $num2;     // выведет 0
// echo $num1;     // выведет 1
// echo $num2;     // выведет 1
// $num1 изменилась только после записи в $num2

// Как работает (ПРЕФИКСНАЯ):
// $num1 = 0; 		
// $num2 = ++$num1; // В $num2 записалась 1

// echo $num2;      // выведет 1
// echo $num1;      // выведет 1

// Если выполняем операцию на отд.строке
// То разницы между префиксной и постфиксной формами - нет.

// $num = 0;
// ++$num;
// echo $num;
// $num++;
// echo $num;



//************ ПРАКТИКА НА ОПЕРАЦИИ В PHP 49\50 **********// ✓

// Количество секунд в сутках:
// $s = 60;
// $m = $s * 60;
// $h = $m * 60;
// $d = $h * 24;
// echo $d . ' seconds in the day' . '<br>';

// Количество секунд в месяце:
// $month = $d * 30;
// echo $month . ' seconds in the month' . '<br>';

// Количество секунд в году:
// $year = $month * 12;
// echo $year. ' seconds in the year' . '<br>';

// Количество минут в дне:
// $minutesDAY = $d / $m;
// echo $minutesDAY . '<br>';

// Количество минут в году:
// $minutesYEAR = $year / $m;
// echo $minutesYEAR . '<br>';



//************ ПРАКТИКА НА ОПЕРАЦИИ В PHP 50\50 **********// ✓

// Нашёл пл. круга:
// $r = 2;
// $p = 3.14;
// $s = $p * ($r**2) ;
// echo $s;

// Нашёл пл. квадрата
// $a = 5;
// $sa = $a * 4;
// echo $a;

// Короче и дальше элементарная Арифметика

?>