<?php
include("functions.php");
$array = [
    1,
    5,
    7,
    3,
    12,
    0,
    5
];
$search_number = 7;
$result = search($array, $search_number);
echo 'Значение ' . ($result ? 'найдено' : 'не найдено');
