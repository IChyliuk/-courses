<?php

$connect  = 'mysql:host=MySQL-8.2;dbname=phpstorm';

$username = 'root';
$password = '';

try{
$pdo = new PDO($connect, $username, $password);

} catch (Exception $exception){
    var_dump($exception->getMessage());
}

