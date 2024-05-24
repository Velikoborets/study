
<?php

// Запишем вбитый url в переменную
$url = $_SERVER['REQUEST_URI'];

// Если URL попадает в регулярку
$route = '^/page/(?<catSlug>[A-Za-z0-9_-]+)/(?<pageSlug>[A-Za-z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
    // Подтягиваем сформированную страницу
    $page = require 'secondEngine/page/show.php';
}

/*
$route = '^/page/(?<catSlug>[a-zA-Z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
    $page = require 'secondEngine/page/categories.php';
}
*/

$route = '^/$';
if (preg_match("#$route#", $url, $params)) {
    $page = require 'secondEngine/page/all.php';
}

// На основе сформированой стр, записываем изменения в шаблон:
$layout = file_get_contents('secondEngine/layout.php');
$layout = str_replace('{{ title }}', $page['slug'], $layout);
$layout = str_replace('{{ content }}', $page['content'], $layout);

echo $layout;