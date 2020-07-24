<?php
$title = "Brand Ceramica";

require_once "functions.php";
require_once 'header.php';

$routes = [
    // срабатывает при вызове корня или /index.php

    // срабатывает при вызове /about или /index.php/about
   '/brand/' => 'brand',
    // динамические страницы
    '/\/admin/m' => 'admin',
    '/\/about/m' => 'about',
    '/\/exit/m' => 'leave',
    '/\/contacts/m' => 'contacts',
    '/\/main/m' => 'main'
];


function getRequestPath() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return '/' . ltrim(str_replace('index.php', 'main', $path), '/');
}

function getMethod(array $routes, $path) {
    foreach ($routes as $route => $method) {
        if( preg_match($route, $path, $match)>0) {
            return $method;
        }
    }
    if($path=='/')return 'main';
    return 'notFound';
}
function admin(){
    if(isAdmin())
        return "admin.php";
    else
    return "login.php";
}

function main($path) {
    return 'main.php';
}

function about($path) {
    return 'about.php';
}

function contacts($path) {
    return 'contacts.php';
}

function leave($path) {
    return 'exit.php';
}
// чуть более сложный пример
// функция отобразит страницу только если
// в запросе приходит id и этот id равен
// 33 или 54
// [/page?id=33]
function brand($path) {

  /*if(  preg_match('/brand\/[а-яА-ЯёЁa-zA-Z0-9]+/', $path, $matches)>0)
  {
  $_GET['post']=str_replace('/brand/','',$path);
      return "brand.php";
  }
  else666*/ return "brand.php";
}

function notFound($path) {
    header("HTTP/1.0 404 Not Found");

    return '404.php';
}

$path = getRequestPath();
$method = getMethod($routes, $path);

require_once $_SERVER["DOCUMENT_ROOT"].'/'. $method($path);
require_once "footer.php";
