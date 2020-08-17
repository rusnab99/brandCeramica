<?php
$host='localhost'; // имя хоста (уточняется у провайдера)
$database='db_brandceramica'; // имя базы данных, которую вы должны создать
$user='admin'; // заданное вами имя пользователя, либо определенное провайдером
$pswd=''; // заданный вами пароль

$dbh = mysqli_connect($host, $user, $pswd,$database) or die("Не могу соединиться с MySQL.");

function isAdmin()
{
    return isset($_COOKIE["isAdmin"])&&$_COOKIE["isAdmin"]==$_SERVER['REMOTE_ADDR'].md5($_SERVER['REMOTE_ADDR']);
}