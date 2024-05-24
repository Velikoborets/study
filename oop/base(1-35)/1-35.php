
/***** ВВЕДЕНИЕ В КЛАССЫ И ОБЪЕКТЫ В PHP 1/107 *****/

<?php

// Класс - чертеж, по которому на заводе делается авто.

// В чертеже (классе), задаются параметры (свойства), 
// которые будут у этого авто.
// Например, у авто будет: цвет, бак, колеса итд.

	class Car // чертеж
	{
		public $color;    // цвет авто
		public $fuel;     // бак
		public $wheels;   // колеса
	}
	
// Также наш авто может ехать: вперёд, назад, лево, право, тормозить итд.
// Соотв. мы эти действия (методы), должны тоже прописать в его чертеже:

	class Car 
	{
		public $color;
		public $fuel;
		public $wheels;
		
		// Команда ехать (метод):
		public function go()
		{
			// указываем ехать
		}
		
		// Команда поворачивать (метод):
		public function turn() 
		{
			// указываем поворачивать
		}
	}
	
// Мы сделали чертеж (класс), теперь по нему (по его св-вам), 
// сделаем сам авто (объект).
// Объект - то, что получилось, т.е авто, например - (феррари).

$ferrari = new Car; // объект, надо хранить в переменной

// Когда мы создали наш авто (объект).
// У него уже есть параметры (св-ва), которые мы прописали в чертеже (классе).
// Теперь зададим конкретно, какие нам параметры (св-ва), нужны для этого авто

$ferrari -> color = 'red';  // красим в красный
$ferrari -> fuel = 50; 		// размер бака 50л
$ferrari -> wheels = 4;		// количество колес - 4

// Отлично! Теперь у нас есть готовый авто, 
// с конкретными свойствами и действиями,
// которые он можем выполнять. Давайте покатаемся на нём!

$ferrari -> go();		// ferrari, едь! 
$ferrari -> turn();		// ferrari, поворачивай!
?>




/***** РАБОТА СО СВОЙСТВАМИ ОБЪЕКТОВ НА PHP 2/107 *****/

<?php

	class User          // класс пользователя сайта (нач. с Б. буквы)
	{
		public $name;  // свойство для имени
		public $age;   // для возраста
	}
	
	// создадим объект по нашему классу, у которого будут соотв-ие. св-ва.
	$user = new User;  // (нач. с м. буквы)
	
	// запишем ему что-нибудь в св-ва и выведем на экран
	$user -> name = 'john'; // записываем конкрет. имя в св-во name
	$user -> age = 25;      // записываем конкрет. возвраст в св-во age
	
	// выведем на экран
	echo $user -> name;
	echo $user -> age;
	
	// Соотв. в св-ва объекта, можно записывать конкретные значения 
	// И выводить их содержимое.
	
	
	// Сделаем 2 объекта, класса user, john и eric и выведем сумму их age
	$john = new User;
	$eric = new User;
	
	$john -> age = '23';
	$eric -> age = '44';
	
	echo $john -> age + $eric -> age; // 67
	
?>




/***** РАБОТА С МЕТОДАМИ ОБЪЕКТОВ НА PHP 3/107 *****/

<?php 

// Метод - это фу-я(), которую может вызывать каждый объект.

	class Employee 
	{
		public $age;
		
		// создаём метод 
		public function go()
		{	
			return 'go!';	
		}
		
	}
	
	// создадим объект john, по классу 
	$john = new Employee;
	
	// прикажем john идти! и выведем это на экран
	echo $john -> go();


// Соотв. как и фу-я, метод может принимать параметры

	class User 
	{
		public $age;
		
		// создаём метод с параметром
		public function showAge($age)
		{
			return $age;
		}
	}
	
	$jack = new User;
	
	// зададим $jack конкретное св-во
	$jack -> age = 25;
	
	// с пом метода, покажем значение этого св-ва
	echo $jack -> showAge($jack -> age);
	
	// можно показать, просто любое число
	echo $jack -> showAge(33);
	
?>




/***** ОБРАЩЕНИЕ К СВОЙСТВАМ КЛАССА ЧЕРЕЗ $this 4/107 *****/

<?php

// 1-Я ЧАСТЬ УРОКА

// Пусть наш метод теперь, выводит св-во класса (например имя)

	class User
	{
		public $name;
		
		// Чтобы обратиться к св-ву класса ($this -> св-во класса).
		public function show()
		{	
			// возвратим св-во класса
			return $this -> name;
		}
	}

	// создадим объект по кл. User и проверим, как это работает
	$gevin = new User;
	$gevin -> name = 'gevin';
	
	echo $gevin -> show(); // gevin
	
	
// 2-Я ЧАСТЬ УРОКА - ЗАПИСЬ СВОЙСТВ

// С помощью $this, можно не только прочитывать св-ва класса, но и записывать.
// Создадим метод setName(), который будет записывать св-во класса.

	class User
	{
		public $name;
		public $age;
		
		// метод, записывающий св-во класса name
		public function setName($name)
		{
			$this -> name = $name;
		}
		
	}
	
	$jack = new User;
	
	$jack -> name = 'jack';
	
	echo $jack -> name; // jack
	
	// теперь перезапишем св-во name, с пом. метода, setName()
	$jack -> setName('erlih');
	
	echo $jack -> name; // erlih
	
?>




/***** ОБРАЩЕНИЕ К МЕТОДАМ КЛАССА ЧЕРЕЗ $this 5/107 *****/

<?php 

// Через $this можно обращаться не только к свойствам объекта, но и к его методам.

// У нас есть 2 проверки, одна изменяет возраст, вторая добавляет.
// Но есть и условие, делать это можно, только если возраст от 18 до 60.
// Чтобы "не раздувать" код и делать меньше ошибок.

// Добавим метод ageCorrect (на проверку лет) и потом используем его в 2 проверках.

	class User
	{
		
		public $name;
		public $age;
		
		// метод проверки возраста на корректность;
		public function checkAge($age)
		{
			return $age >= 18 && $age <= 60 ? true : false;
		}
		
		// метод изменения возраста юзера (при условии, что возраст корректен).
		// (если возраст < 18, ничего не меняем).
 		public function setAge($age)
		{
			return $this -> checkAge($age) ? $this -> age = $age : '';
		}
		
		
		// метод добавления лет к возрасту (при усл. что возраст корректен)
		// (если возраст < 18, ничего не меняем).
		public function addAge($years)
		{			
			$newAge = $this -> age + $years;
			return $this -> checkAge($newAge) ? $this -> age = $newAge : '';
		}
		
	}
	
	$jack = new User;
	
	$jack -> age = 20;
	echo $jack -> age . '<br>'; // 20
	
	$jack -> setAge(30);
	echo $jack -> age . '<br>'; // 30
	
	$jack -> addAge(20);
	echo $jack -> age . '<br>'; // 50
	
	$jack -> addAge(-40);
	echo $jack -> age . '<br>'; // ($age < 18) - выведет 50 (ничего не меняем).
?>




/***** МОДИФИКАТОРЫ ДОСТУПА PUBLIC И PRIVATE 6/107 *****/

<?php

// public - данные св-ва, доступны вне кода class.
// private -  наоборот, св-ва, НЕ доступны вне кода class.

// Есть class Car
// У него есть методы (основные и вспомогательные).
// Вспомогательные - лучше не юзать, вне класса. (private)
// Чтобы ничего случайно не сломать.

// Такой подход - это Инкапсуляция.
// (Когда все лишнее, не доступно извне).

// Аналогично методам, работают св-ва.

	class User
	{	
		// Приватное св-во $name (доступ то-ко в class)
		private $name;
		public $age;
		
 		public function setAge($age)
		{
			return $this -> checkAge($age) ? $this -> age = $age : '';
		}
		
		public function addAge($years)
		{			
			$newAge = $this -> age + $years;
			return $this -> checkAge($newAge) ? $this -> age = $newAge : '';
		}
		
		// checkAge() - у нас в коде, как вспомогательный метод (private). 
		// Такие методы принято писать в конце кода.
		public function checkAge($age)
		{
			return $age >= 18 && $age <= 60 ? true : false;
		}	
	}
	
	// Если не знаем, каким делать методом (public or private).
	// Всегда делаем private. Чтобы уберечь себя от ошибок.
	
	$jack = new User;
	
	// $jack -> name = 'jack'; // error (private св-во)
	
	$jack -> age = 22;
	echo $jack -> age . '<br>'; // 22
	
	$jack -> addAge(10);
	echo $jack -> age . '<br>'; // 32
	
?>




/***** КОНСТРУКТОР ОБЪЕКТА В ООП НА PHP В 7/107 *****/

<?php

// При создании объекта, когда в классе много св-в,
// можно легко забыть, записать конкретные св-ва:

	// $user = new User;

// Например, тут много конкретных св-в, которые надо записать
	// $user -> name = 'john';
	// $user -> age = 25;


// Удобно было бы, записать конкр. св-ва сразу, при создании объекта, вот так
	// $user = new User('john', 25);


// Чтобы это сделать, надо исп. метод "__construct" (конструктор)
// (Если в коде class, существ. метод __construct, 
// он будет автоматически вызываться при создании объекта).

	class User
	{
		public $name;
		public $age;
		
		public function __construct($name, $age) 
		{
			$this -> name = $name; // запишем св-во $name
			$this -> age = $age;   // $age соотв. 
		}
	}


// Теперь можем записывать конкретные св-ва сразу при созд объекта:
	$user = new User('john', 25);
	
	echo $user -> name; // john
	echo $user -> age;  // 25


// * Примечание
// Помним, что __construct - условно обычный метод. (только без return)

	public function __construct($var1, $var2) 
	{
		{
			echo $var1 + $var2;
		}
	}
	
	$user = new User(1, 2); // 3, только вызывается при созд. объекта
?>




/***** РАБОТА С ГЕТТЕРАМИ И СЕТТЕРАМИ В ООП НА PHP 8/107 *****/

<?php

// Чтобы нельзя было нечаяно изменить св-ва объекта на прямую (напр. $age)
// Вот так  $user -> age = 25;
// Используется подход "геттеров" и "сеттеров":

	class User
	{
		public $name;
		private $age; // объявим возраст приватным 
		
		// проверка при получении (чтении) знач. ("getter")
		public function getAge()
		{
			return $this -> age;
		}
		
		// проверка при установке знач. ("setter")
		public function setAge($age)
		{
			$this -> checkAge($age) ? $this -> age = $age : '';
		}
		
		private function checkAge($age)
		{
			return $age >= 18 and $age <= 60;
		}
	}

	// Теперь мы свободно можем и менять и получать возраст,
	// НО ТОЛЬКО С ПОМОЩЬЮ setAge() и getAge()
	$user = new User;
	
	// Установим возраст:
	// $user -> age = 25; 		// error
	$user -> setAge(50);        // 50
	
	
	// Прочитаем новый возраст:
	echo $user -> getAge();     // 50
?>




/***** СВОЙСТВА ТОЛЬКО ДЛЯ ЧТЕНИЯ В ООП НА PHP 9/107 *****/

<?php

// User.php

// Можно сделать так, чтобы св-во только читалось, но не изменялось.
// Для этого: добавим этому св-ву только "getter", а "setter" - не будем.

class  User {
	
	private $age;
	private $name;
	
	// применим "конструктор объекта", чтобы сразу задать ему св-ва
	public function __construct($name, $age)
	{
		$this -> name = $name;
		$this -> age = $age;
	}
	
	// св-во name, у нас будет только, для чтения (getter only)
	public function getName()
	{
		return $this -> name;
	}
	
	// а вот setAge(), для чтения и записи (getter + setter )
	public function setAge($age)
	{
		return $this -> age = $age;
	}
	
	public function getAge ()
	{
		return $this -> age;
	}
}

// создать объект сразу с конкретными св-вами
$cris = new User('cris', 23);

// возраст и читаем и изменяем:
echo $cris -> getAge();  // 23

$cris -> setAge(44);
echo $cris -> getAge();  // 44

// имя только читаем
echo $cris -> getName(); // cris 

?>




/***** ХРАНЕНИЕ КЛАССОВ В ОТДЕЛЬНЫХ ФАЙЛАХ В PHP 10/107 *****/

<?php 

// Есть правило, что 1 class = 1 file.
// И также что "имя class" = "имени file этого класса".

// User.php
	
	class User
	{
		
	}

// index.php

// * require_once - если файла нет, то error. А также повторно не подкл. файл.

	require_once 'User.php'; 

	$jack = new User;

?>




/***** ХРАНЕНИЕ ОБЪЕКТОВ В МАССИВАХ В ООП НА PHP 11/107 *****/

<?php 

// User.php

	class User
	{
		public $name;
		public $age;
		
		public function __construct($name, $age) 
		{
			$this -> name = $name;
			$this -> age = $age;
		}
	}
	
// index.php

	require_once 'User.php';
	
	// объект можно записывать, не только в перемен, но и в массив
	$users = [
		new User('john', 21),
		new User('eric', 22),
		new User('kyle', 23)
	];
	
	// переберм массив с объектами:
	foreach ($users as $user) {
		echo $user -> name .  ' ' . $user -> age . '<br>'; // john 21 итд
	}

?>




/***** НАЧАЛЬНЫЕ ЗНАЧЕНИЯ СВОЙСТВ В КОНСТРУКТОРЕ 12/107 *****/

<?php

// с пом. "конструктора", можно задавать нач. св-ва объекта

// User.php

	class Student
	{
		private $name;
		private $course;
		
		public function __construct()
		{
			// задаём нач. знач. св-в объекта
			$this -> name = 'jack';
			$this -> course = 1;
		}
		
		// имя будет только для чтения, курс - меняется
		public function getName ()
		{
			return $this -> name;
		}
		
		public function getCourse()
		{
			return $this -> course;
		}
		
		// усл. "setter", для перевода на след. курс
		public function nextCourse()
		{
			return $this -> course + 1;
		}
	}
	
	$jack = new Student();
	
	echo $jack -> getName() . '<br>';    // jack
	 
	echo $jack -> getCourse() . '<br>';  // 1
	
	echo $jack -> nextCourse();          // 2
	
?>




/***** НАЧАЛЬНЫЕ ЗНАЧЕНИЯ СВОЙСТВ ПРИ ИХ ОБЪЯВЛЕНИИ 13/107 *****/

<?php

// Можем задавать конкретные св-ва сразу, при их объявлении 
// (смысл работы такой же, как и с переменной/массивом).

// Test.php

	class Test
	{
		public $prop1 = 'value1';  // задаем начальное значение 
		public $prop2 = 1 + 2;
		private $numbers = [1, 2]; // можем задать и массив в качестве нач.знач.
		
		
		// запишем в массив значение (и автоматически запишем и в объект)
		public function __construct()
		{
			$this -> numbers[] = 3;
		}
		
		// Можем создать метод который должен принимать массив чисел
		// и добавлять все числа в конец массива (это с ДЗ)
		public function addArrNumb(array $arr)
		{
			// array_merge, записывает второй массив в конец первого
			return $this -> numbers = array_merge($this -> numbers, $arr);
		}
		
		// т.к св-во $numbers приватное, добавим getter, чтобы его читать
		public function getNumbers()
		{
			return $this -> numbers;
		}
		
	}
	
	$test = new Test;
	
	echo $test -> prop2 . '<br>';          // 3
	
	print_r($test -> getNumbers());        // [0] => 1 [1] => 2 [2] => 3
	
	print_r($test -> addArrNumb([4,5]));   // [0] => 1 [1] => 2 
										   // [2] => 3 [3] => 4 [4] => 5 
?>	




/**** ПЕРЕМЕННЫЕ НАЗВАНИЯ СВОЙСТВ ОБЪЕКТОВ и МЕТОДОВ В PHP 14,15/107 ****/

<?php
	
// ЧАСТЬ 1

class City
{
	public $name;
	public $population;
	
// пишем св-ва так, чтобы при создании объекта они были переменными
	public function __construct($name, $population)
	{	
		$this -> name = $name;
		$this -> population = $population;
	}
	
// "getter" метод для вывода имени
	public function getName()
	{
		return $this -> name;
	}
}

// теперь при создании объекта, эти св-ва, как переменные
$brest = new City('brest', 300000);

echo $brest -> name;       // brest
echo $brest -> population; // 300000


// есть.массив, знач. которого эквиваленты, св-вам класса user 
$props = ['name', 'population'];

foreach ($props as $value) {
	echo $brest -> $value . '<br>';  // вывод аналогичен, выводу выше
}


// ЧАСТЬ 2 
	
// чтобы вывести не все значения, а одно берем в { скобки }
echo $brest -> {$props[0]};  // brest

// массив может быть ассоциативный
$propAssoc = ['prop1' => 'name', 'prop2' => 'population'];
echo $user -> {$props['prop1']};  // brest

// имя св-ва может быть и из ФУНКЦИИ
function getProp()
{
	return 'name';
}
echo $brest -> {getProp()}; // brest


// имя св-ва может быть и СВОЙСТВОМ другого объекта
$anotherObject = new City('name', 350000);
echo $brest -> {$anotherObject -> name};    // brest


// имя св-ва может быть и МЕТОДОМ другого объекта
echo $brest -> {$anotherObject -> getName()};    // brest


// МЕТОДЫ

// Как и со св-вами, в перемен. можно хранить имена методов.
$method = 'getName';
echo $brest -> $method(); // brest

// Если имя метода из массива, то берем его в { скобки }
$methods = ['getName', 'getAge'];
echo $brest -> {$methods[0]}();  // brest

// Аналогично работает с ассоциативным массивом
$assocMethod = ['method1' => 'getName', 'method2' => 'getAge'];
echo $brest -> {$assocMethod['method1']}(); // brest

?>




/**** ВЫЗОВ МЕТОДА СРАЗУ ПОСЛЕ СОЗДАНИЯ ОБЪЕКТА 16/107 ****/

<?php

	class Arr
	{
		private $numbers = []; // массив чисел 
		
		// при созд. объекта сразу запишем в его конкр. св-ва (массив)		
		public function __construct($numbers)
		{
			$this -> numbers = $numbers; 
		}
		
		// добавляем еще одно число в наш массив
		public function add($number)
		{
			$this -> numbers[] = $number;
		}
		
		// находим сумму чисел
		public function getSum()
		{
			return array_sum($this -> numbers);
		}
	}
	
	// созд. объект и записываем в него массив [1, 2, 3]
	$arr = new Arr([1, 2, 3]);
	
	// добавляем к конец массива число 4
	$arr -> add(4);
	
	// находим сумму элементов массива
	echo $arr -> getSum();  // выведет 10
	
	// можно создать объект и одновременно вызвать метод
	echo (new Arr([1, 2, 3])) -> getSum(); // 6
	
	// можно напр. найти сумму двух массивов
	echo (new Arr([1, 2, 3])) -> getSum()
	+ (new Arr([1, 2, 3])) -> getSum();    // 12

?>




/**** ЦЕПОЧКИ МЕТОДОВ 17/107 ****/

<?php

// Возьмем в пример часть кода из прошлого урока.

// Если нам надо сделать так, чтобы методы вызывались не отдельно,
// а вот так: echo $arr -> add(1) -> add(2) -> getSum(); // 3

// Для этого, нужно, чтобы все методы возвращали $this (кроме посл-го)

	class Arr
	{
		private $numbers = []; // массив чисел 	

		// добавляем еще одно число в наш массив
		public function add($number)
		{
			$this -> numbers[] = $number;
			return $this; // вернем ссылку сами на себя 
		}
		
		// находим сумму чисел
		public function getSum()
		{
			return array_sum($this -> numbers);
		}
	}
	
	$arr = new Arr;
	echo $arr -> add(1) -> add(2) -> getSum(); // 3
	
	// Или упростим еще больше
	echo (new Arr) -> add(1) -> add(2) -> getSum(); // 3

?>




/**** КЛАСС КАК НАБОР МЕТОДОВ В ООП НА PHP 18/107 ****/

<?php

// Часто классы встречаются, как наборы методов сгруппированных вместе.
// В этом случае, достаточно одного объекта.

	class ArraySumHelper // класс с набором методов, для работы с arr
	{	
		// Методы, которые возвращают с помощью ВСПОМОГАТЕЛЬНОГО метода
		// Сумму элементов массива, элементы которого, возведены в СТЕПЕНЬ 
		public function getSum1($arr)
		{
			return $this -> getSum($arr, 1);
		}
		
		public function getSum2($arr)
		{
			return $this -> getSum($arr, 2);
		}
		
		public function getSum3($arr)
		{
			return $this -> getSum($arr, 3);
		}
		
		// Вспомогательный метод, для возведения в степень
		// И суммирования всех элементов массива
		private function getSum($arr, $num) {
			
			$sum = 0;
			foreach ($arr as $elem) {
				// возводим в степерь и сразу суммируем
				$sum += pow($elem, $num);
			}
			return $sum;
			
		}
	}
	
	$arr = [1, 2, 3];
	$arraySumHelper = new ArraySumHelper;
	
	echo $arraySumHelper -> getSum1($arr);       // 6
	echo $arraySumHelper -> getSum2($arr);       // 14
	echo $arraySumHelper -> getSum3($arr);       // 36
?>




/**** НАСЛЕДОВАНИЕ КЛАССОВ НА PHP 19/107 ****/

<?php

// ЧАСТЬ 1 

// Ситуация такая, что у Бати и у Сына одинаковые волосы.
// Чтобы их не дублировать, используем "наследование" :

	// Есть батя - "родитель"
	class Father
	{
		public $hair = 'брюнет';
		
		// goodness (добрый) - приватное св-во бати
		private $goodness = 'добрый';
		
		// цвет волос бати и сына через "геттер"
		public function getHair()
		{
			return $this -> hair;
		}
		
		// характер бати через "геттер"
		public function getGoodness()
		{
			return $this -> goodness;
		}
	}
	
// "private $goodness" - не наследуется т.к оно лично Бати (приватное).	
// К методам работает также, публичные - наследуются, приватные - нет.

	class Son extends Father
	{
		// Глаза у сына свои (не Батины)
		public $eyes;

	}
	
// создадим сына и узнаем его св-ва
$ivan = new Son;

echo $ivan -> hair;           // брюнет (унаследовал от бати, публ. св-во)
// echo $ivan -> goodness;    // ошибка (св-во только бати, приват.св-во)
echo $ivan -> getGoodness();  // добрый (публ.метод)


// ЧАСТЬ 2 (НЕСКОЛЬКО ПОТОМОКОВ)

// Прикол наследования в том, что класс (Батя),
// может иметь несколько потомков.

	// пусть у дочки волосы такие же как и у Бати
	class Daughter extends Father
	{
		// но вес у дочки свой
		private $weight = '30kg'; // вес
		
		public function getWeight()
		{
			return $this -> weight;
		}
		
	}

// создадим дочку и узнаем ее св-ва
$masha = new Daughter;

echo $masha -> hair;        // брюнет
echo $masha -> getWeight(); // 30kg
// echo $masha -> $goodness;   // ошибка


// ЧАСТЬ 3 (НАСЛЕДОВАНИЕ ОТ НАСЛЕДНИКОВ)

// Вдруг Маша и Иван поженились (бывает и такое)
// И у них родился сын (Саня). Который унаследовал глаза отца (ивана)

	class SonIvan extends Son
	{
		// но нос у сына ивана, свой
		private $nose = 'прямой';
	}
	
$sanya = new SonIvan;

echo $sanya -> getEye();  // голубые
	
?>




/**** МОДИФИКАТОР ДОСТУПА PROTECTED В ООП НА PHP 20/107 ****/

<?php

// У Бати есть секретный рецепт блинов. И батя хочет его передать только Сыну.
// (Хотим, чтобы Потомк унаследовал свойства, а для осальных они не были доступны)

// (private) - только Отец сможет его использовать Сын не сможет узнать
// (public) - если рецепт будет публичным, его увидят все
// (protected) - Сын сможет использовать и никто снаружи его не увидит


// Отец (родитель)
class Father {
    protected $recipe = "Секретный рецепт блинчиков от отца";
	
	// можем получить рецепт, только если Батя покажет!
    public function showRecipe() {
        return $this -> recipe;
    }
}

// Сын (потомок)
class Son extends Father {
}

$son = new Son();
echo $son -> showRecipe(); // Секретный рецепт блинчиков от отца

// Попытка получить рецепт без Бати, напрямую
echo $son -> recipe;       // выдаст ошибку, т.к. $recipe защищен

// * При обращениее к св-ву родителя напрямую, в другом файле-обратиться получится.
// Но мы обратимся не к св-ву родителя. А к "болванке" присущей только тек. файлу.
?>




/**** ПЕРЕЗАПИСЬ МЕТОДОВ РОДИТЕЛЯ В КЛАССЕ ПОТОМКЕ 21/107 ****/

<?php

// Отец готовит завтрак — тосты. 
// Сын, хочет готовить также. Только добавить к завтраку еще и сок

class Father
{

    public function makeBreakfast()
    {
        return 'Готовлю тосты';
    }

}

class Son extends Father
{

    public function makeBreakfast()
    {
	   // Сначала через язык. конструкцию "parent::"
	   // Вызываем метод отца, чтобы приготовить тосты.
	   // А далее добавим к ним сок.
       return parent::makeBreakfast() . ' и добавляю сок';
	   
	   // также мы можем "втупую", переопределить метод Бати,
	   // назвав его также, и сотворить херню.
	   // echo 'хуйня';
    }

}

// Создаем объект класса Son
$son = new son();

// Готовим завтрак
echo $son -> makeBreakfast(); // Готовлю тосты и добавляю сок

?>




/**** ПЕРЕЗАПИСЬ КОНСТРУКТОРА РОДИТЕЛЯ В ПОТОМКЕ 22/107 ****/

<?php

// У Бати есть характеристики, такие как имя и возраст,
// которые являются приватными (private) и доступны только через геттеры. 

	class Father 
	{
		
		private $name;
		private $age;

		public function __construct($name, $age) 
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		public function getName() 
		{
			return $this -> name;
		}

		public function getAge() 
		{
			return $this -> age;
		}
	}

// Сын наследует характеристики от своего отца, (публ. методы имени и возраста, а также __construct), но и имеет свою хар-ку - класс в школе.
/*
class Son extends Father {
	
    private $schoolClass;

    public function schoolClass() {
        return $this -> schoolClass;
    }
}

$son = new Son('son', 15);

echo $son -> getName(); // выведет 'son'
echo $son -> getAge();  // выведет 15
*/


// Но что, если надо при созданни объекта Сына,
// передавать еще и его класс в школе? 
// Мы можем переопределить конструктор родителя в классе Son,
// добавив св-во $schoolClass

class Son extends Father { // наследуем публ. методы и конструктор Бати
	
    private $schoolClass;

    public function __construct($name, $age, $schoolClass)
	{
		
		// С пом. язык. констр. "parent::" вызываем конструктор Бати
        parent::__construct($name, $age); 
		
		// добавляем характеристику сына
        $this -> schoolClass = $schoolClass;
		
    }

    public function getSchoolClass()
	{

        return $this -> schoolClass;

    }
	
}

// Теперь при создании объекта Сына 
// мы можем передать его имя, возраст и класс в школе
$son = new Son('son', 15, 6);

echo $son -> getName();         // выведет 'son'
echo $son -> getAge();          // выведет 15
echo $son -> getSchoolClass();  // выведет 6

?>




/**** ПЕРЕДАЧА ОБЪЕКТОВ ПО ССЫЛКЕ 23/107 ****/

<?php

// класс который хранит информацию о человеке - его имя и возраст.
class Person 
{
	
    public $name;
    public $age;

    public function __construct($name, $age) 
	{
		
        $this -> name = $name;
        $this -> age = $age;
		
    }
}

// Теперь в памяти есть объект $father (Батя) с name = "John"` и age = 55.
	$father = new Person('John', 55);

// Тут мы не создаем Сына, а говорим, что сын получает все данные отца.
// Теперь и $father и $son ссылаются на один и тот же объект в памяти.
	$son = $father;

// Если мы изменим данные Сына, то они отразятся и на отце.
// т.к к $son и $father` указывают на один и тот же объект
   $son -> name = 'Young John';
   echo $father -> name; // Young John


// НО если Батя решит поменятся и стать проще (получит примитивный тип данных)
	$father = 123;    // никак не повлияет на сына 

// Т.к Сын хранит ссылку на объект 'Young John', 55
// т.е объект остается в памяти, пока не него есть хоть 1 ссылка.
	echo $father;      // 123
	echo $son -> name; // Young John

?>




/**** ИСПОЛЬЗОВАНИЕ КЛАССОВ ВНУТРИ ДРУГИХ КЛАССОВ 24/107 ****/

<?php

// Наследование - не всегда эффективно:
// 1. Не всегда нам надо наследовать все св-ва и методы опр. класса
// 2. Иногда необходимо исп. несколько классов внутри 1-го класса
// 3. А в РНР пункт 2, не релевантен, т.к у класса может быть только 1 родитель
	
// * Поэтому чаще всего проще воспользоваться методами другого класса не наследуя его

// SumHelper.php - класс, где есть куча методов, он будет "помощником"
    class SumHelper
    {
        // Сумма квадратов элементов
        public function getSum2($arr)
        {
            return $this->getSum($arr, 2);
        }

        // Сумма кубов элементов
        public function getSum3($arr)
        {
            return $this->getSum($arr, 3);
        }

        // Вспомогательный метод для нахождения суммы элементов вовз. в степень
        private function getSum($arr, $power)
        {
            $sum = 0;

            foreach ($arr as $elem) {
                $sum += pow($elem, $power);
            }

            return $sum;
        }
    }
	

// Arr.php - класс где мы хотим использовать эти методы
	require_once 'SumHelper.php';

    class Arr
    {
        private $nums = [];   // сво-во - массив, для хранения чисел
        private $sumHelper;	  // св-во для записи объекта класса помощника

        public function __construct()
        {
            // В св-во запишем объект класса помощника
            $this->sumHelper = new SumHelper;

			// Теперь обращаясь к этому объекту
			// Можем пользоваться методами класса помощника sumHelper
        }
		
		// метод для добавления числа в массив
        public function add($num)
        {
            $this->nums[] = $num;
        }

        // Воспользуемся, методами класса Sumhelper,
		// С помощью св-ва sumHelper, в которое записан объект
        public function getSum23()
        {
			// Для удобства в перемен. $nums запишем обращение к св-ву
			// $nums у нас выступает в качестве массива,
			// В который мы записываем значения и "прогоняем", через методы др. class
			$nums = $this->nums;

			// найдем сумму двух методов из класса-помощника SumHelper
			$sum = $this->sumHelper->getSum2($nums) + $this->sumHelper->getSum3($nums);
            return $sum;
        }
    }

// index.php - создадим объект класса Arr и используя его методы,
// И методы класса SumHelper - Добавим числа в массив и выведем сумму,
// Квадратов и кубов их элементов.

    require_once 'Arr.php';

    $arr = new Arr();

    $arr->add(2);
    $arr->add(2);

    echo  $arr->getSum23(); // 24
	
?>




/**** ПЕРЕДАЧА ОБЪЕКТОВ ПАРАМЕТРАМИ 25/107 ****/

<?php


// Product.php
    class Product
    {
        private $name;
        private $price;
        private $quantity;

        public function __construct($name, $price, $quantity)
        {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }

        public function getQuantity()
        {
            return $this->quantity;
        }

        public function getPrice()
        {
            return $this->price;
        }

        // Полная стоимость продукта
        public function getCost()
        {
            return $this->quantity * $this->price;
        }
    }



// Cart.php
 require_once 'Product.php';

    class Cart
    {
        private $products = [];

        // все продукты
        public function getAllProducts()
        {
            return $this->products;
        }

        // добавить продукт
        public function add($product)
        {
            $this->products[] = $product;
        }

        // удалить продукт
        public function remove($product)
        {
            unset($product);
        }

        // суммарная стоимость продукта
        public function getTotalCost()
        {
            $sum = 0;
            foreach ($this->products as $product) {
                $sum += $product->getPrice();
            }

            return $sum;
        }

        // суммарное количество продуктов
        public function getTotalQuantity()
        {
            $sum = 0;
            foreach ($this->products as $product) {
                $sum += $product->getQuantity();
            }

            return $sum;
        }

        // средняя стоимость продукта
        public function getAvgPrice()
        {
            $sum = 0;
            foreach ($this->products as $product) {
                $sum += $product->getPrice();
            }
            $count = count($this->products);
            $res = $sum / $count;
            return $res;
        }

    }


// index.php
	require_once 'Cart.php';

	// создаём объект класса Cart (корзину)
	$cart = new Cart;

	// Используя метод add(), класса "cart".
	// Добавляем в массив (корзину) 2 объекта Product(со св-вами из __construct)
	// т.е одновременно создавая его
	$cart->add(new Product('jeans', 200, 2));
	$cart->add(new Product('clothes', 100, 1));

	// В Arr записаны 2 объекта Product с у кажд. свои св-ва из __construct
	// И мы можем через объект класса $cart, обратиться к своим методам,
	// Которые в свою очередь обратяться к методам Product.php
	// И сделают необходимые манипуляции
	echo $cart->getAvgPrice() . '<br>'; // 150 - ср. стоимость продуктов
	echo $cart->getTotalQuantity() . '<br>'; // 3 - всё кол-во продуктов
	echo $cart->getTotalCost() . '<br>'; // 300 - сум. стоимость всех прод.


	echo '<pre>';
	print_r($cart->getAllProducts());
	echo '</pre>';
	// в [0] => Product Object - будет находится объект, где 'jeans', 200, 2
	// в [1] => Product Object- будет находится объект, где 'clothes', 100, 1
?>




/**** СРАВНЕНИЕ ОБЪЕКТОВ В ООП НА PHP 26/107 ****/

<?php

// "==" -  все св-ва и значения равны (аналогично с перем.), но разн. объекты
// "===" - всё тоже самое как и выше, но ссылаются на один и тот же объект

// Создадим объекты для теста
$user1 = new User('john', 30);
$user2 = new User('john', 30);
$user3 = new User('jack', 30);

// сравниваем объекты через "==" (равенство):
// var_dump($user1 == $user2);  // true  итд...

// А теперь сравним через '===' (эквивалентность)
// Тут будет false, т.к каждая переменная ссылается на разн. объекты
// var_dump($user1 === $user2); // false

// Чтобы было "true", надо, чтобы переменные ссылались на 1 тот же объект
// $user1 = $user2;
// var_dump($user1 === $user2); // теперь true


// ДЗ (1,2,3) - (написали метод "compare", для сравнения)
    public function compare($object1, $object2)
    {
        // ссылаются на один и тотже объект
        if ($object1 === $object2) {
            return 1;
        }
        // всё одинаковое, только разные объекты
        elseif ($object1 == $object2) {
            return 0;
        }
        else {
            return -1;
        }
    }

var_dump($user3->compare($user1, $user2)); // 0

$user1 = $user2;
var_dump($user3->compare($user1, $user2)); // 1



// ДЗ(4) и написали соотв. метод "exists" (вставили его в add())
// чтобы проверить перед добавлением, есть ли такой же объект

    private function exists($newEmployee)
    {
        // перебираем массив (св-во employees)
        foreach ($this->employees as $employee) {
            if ($employee == $newEmployee) {
                return true;
            }
        }
    }

$employeesCollection = new EmployeesCollection;
$employeesCollection->add(new Employee('john', 100));
// второго такого же не добавит т.к есть проверка на совпадение объектов при добавлении нового объекта
$employeesCollection->add(new Employee('john', 100));

echo '<pre>';
print_r($employeesCollection->get()); // только 1 чел в массиве
echo '</pre>';

// ДЗ (5) можно удалить метод exists и исп. фу-ию:
// in_array($newEmployee, $this->employees, false);
// false - сравнение параметров по "=="
// true - сравнение параметров по "==="

    public function add($newEmployee)
    {
        if (!in_array($newEmployee, $this->employees, false)) {
            $this->employees[] = $newEmployee;
        }
    }
?>




/**** ОПРЕДЕЛЕНИЕ ПРИНАДЛЕЖНОСТИ ОБЪЕКТА К КЛАССУ 27/107 ****/

<?php

	// класс Employee (с опр. св-вами и getter)
    class Employee
    {
        private $name;
        private $salary;

        public function __construct($name, $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getSalary()
        {
            return $this->salary;
        }
    }
	
	// Listing - класс (где методы с для работы с классом Student, Employee)
	require_once 'Employee.php';
    require_once 'Student.php'; // ("псевдо" класс, аналогичен Employee)

    class Listing
    {
        private $employees = []; // массив хранения работников
        private $students = [];  // массив хранения студентов

        public function add($user)
        {
            // Опред. к какому классу принадлежат объекты $user,
            // Если к классу Employee, то запишем в массив $employee
            if ($user instanceof Employee) {
                $this->employees[]= $user;
            }

            if ($user instanceof Student) {
                $this->students[] = $user;
            }
        }

		// общая зп работников
        public function getTotalSalary()
        {
            $sum = 0;
            // Переберем массив с работниками
            // ($employee - объект в котором записаны опр. св-ва)
            foreach ($this->employees as $employee) {
                $sum += $employee->getSalary();
            }
            return $sum;
        }
		
		// общая степуха студентов
        public function getTotalScholarship()
        {
            $sum = 0;
            foreach ($this->students as $student) {
                $sum += $student->getScholarship();
            }
            return $sum;
        }

        // Общая сумма платежей и работникам и студентам
        public function getTotalPayment()
        {
            return $this->getTotalScholarship() + $this->getTotalSalary();
        }

        public function getEmployeeList()
        {
            return $this->employees;
        }
    }


// index.php
require_once 'Listing.php';

// instanceof - опр. к какому классу принадлежит объект.

// $obj = new ParentClass;   // объект родительского класса
// var_dump($obj instanceof ParentClass); // выведет true
// var_dump($obj instanceof ChildClass);  // выведет false (не принад. доч.)

// Соотв. Если брать дочерний класс и создать по нему объект,
// То он будет принадл. как своему классу так и родительскому
// $obj = new ChildClass;   // объект дочернего класса
// var_dump($obj instanceof ParentClass); // выведет true
// var_dump($obj instanceof ChildClass);  // выведет true


$listing = new Listing();

// добавляем студентов в массив
$listing->add(new Student('kali', 1000));
$listing->add(new Student('zoi', 2000));

// добавляем сотрудников в массив
$listing->add(new Employee('Mike', 3000));
$listing->add(new Employee('like', 4000));

echo $listing->getTotalSalary();
echo $listing->getTotalPayment();

echo '<pre>';
print_r($listing->getEmployeeList());
echo '</pre>';
?>




/**** КОНТРОЛЬ ТИПОВ ПРИ РАБОТЕ С ОБЪЕКТАМИ 28/107 ****/

<?php

// Employee.php
// (Работник со св-вами и геттерами и сеттерами)
    class Employee
    {
        private $name;
        private $salary;

        public function __construct($name, $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getSalary()
        {
            return $this->salary;
        }
    }    


// Класс для добавления работника и подсчёта з\п
	class EmployeesCollection
	{
		private $employees = []; // массив работников
		
		// Добавляет (объект) работника, параметром. Для этого,
        // явно укажем тип, чтобы не добавить ничего другого.
        // В роли типа у нас выступает - (Объект класса Employee)
		public function add(Employee $employee) 
		{ 
			$this->employees[] = $employee; 	
		}
		
		public function getTotalSalary()
		{
			$sum = 0;
			
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary();
			}
			
			return $sum;
		}
	}

?>




/****  29/107 ****/