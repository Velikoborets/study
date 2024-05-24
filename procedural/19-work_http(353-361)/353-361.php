
<?php

/*** МЕТОД HTTP ЗАПРОСА(браузер) В PHP 354/361 ***/  

// C помощью $_SERVER['REQUEST_METHOD']; 
// Можем узнать, метод, которым был отпр. запрос.

/* page2.php *
	
	$method = $_SERVER['REQUEST_METHOD'];
	var_dump($method); // GET

// При первом запросе, мы только получим данные
// Соотв. будет GET.

	    <form action="/show.php/" method="POST">
	        <input name="test1" value="1">
	        <input name="test2" value="2">
	        <input type="submit">
	    </form>
*/


/* show.php *

	// Т.к в другом файле форма была передана POST
	// То будет POST

	$method = $_SERVER['REQUEST_METHOD'];
	var_dump($method); // POST
*/



/*** HTTP ЗАГОЛОВКИ ЗАПРОСА(браузер) В PHP 355/361 ***/  

// Можем получить значения заголовков запроса(браузера).
// Они содержатся в С.Г.М $_SERVER
/*
	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";
*/
// Ключ каждого заголовка начинается с 'HTTP_'
// Далее идет имя заголовка заг.буквами:
// (Вместо дефиса, ставим "_");

// Выведем значение "HOST":
// echo $_SERVER['HTTP_HOST']; // study
// (т.к у нас "HOST: study");



/*** МАССИВ ЗАГОЛОВКОВ HTTP ЗАПРОСА(браузер) В PHP 356/361 ***/  

// Получение всех http-заголовков запроса:
/*
    $arr = getallheaders();
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
*/



/*** ЗАГОЛОВКИ HTTP ОТВЕТА В PHP 357/361 ***/ 

// Можно отпр. http-заголовки ответа(сервака) в браузер.
// С помощи фу-ии "header()" 
// (приказ. серваку отпр. нам заголовки):

/*
1. Скажем серверу, отпр. в браузер текст:
	$headers_content = header('Content-Type: text/plain');

2. Скажем серверу, созд. наш кастомный заголовок
	$headers_custom = header('X-Powered: BY');
*/



/*** ПРОБЛЕМА С ЗАГОЛОВКАМИ HTTP ОТВЕТА В PHP 358/361 ***/ 

// Если мы перед вызовом фу-ии header(),
// Выведем, что-нибудь на экран,
// То это будет трактоваться как начало тела ответа!
// Поэтому ничего не выводить, раньше их отправки!



/*** ПРОБЛЕМА С ЗАГОЛОВКАМИ HTTP ПРИ INCLUDE В PHP 359/361 ***/ 

// Во всех РНР-файлах, лучше удалять, закр. тег РНР,">?"
// Чтобы не было ошибок при include др. файлов.
// (Особенно это касается пустых строк).



/*** ОТДАЧА СТАРТОВОЙ СТРОКИ HTTP ОТВЕТА В PHP 360/361 ***/ 

// С помощью header(), можно отдавать стартовую строку http-отв.
// Это исп. для того, чтобы указать статус, для 404 ошибки.

// $error_header = header('HTTP/1.1 404 Not Found');



/*** ОТДАЧА СТАТУСА HTTP ОТВЕТА В PHP 361/361 ***/ 

// Можно задать статус http-отв. без старт.строки:
// $with_start_line = http_response_code(404);



// -----------------------------------------------------
// С помощью $_SERVER, можем получить, заголовки запроса.
// echo $_SERVER['HTTP_HOST']; // study 

// С помощью header(), можем получить заголовки ответа.
// ----------------------------------------------------- 