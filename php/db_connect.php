<?php
$hostname='localhost';
$username='root';
$password='';
$database='db_filebox';
$driver='mysql';
$charset='utf8';
$options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo_connect = new PDO("$driver:host=$hostname; dbname=$database; charset=$charset",
    $username, $password, $options);
        echo('База данных подключена<br>');
}catch (PDOException $e){
    die('Ошибка подключения');
}