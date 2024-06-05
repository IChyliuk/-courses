<?php
$array = array(0, -1, -5, 3, 52, 101, 364, 1); // массив элементов
$array = array(0, -1, -5, 3, 52, 101, 364, 1); // массив
var_dump($array);
for ($i = 0; $i < sizeof($array); $i++) { // сортировка
    for ($j = 0; $j < sizeof($array) - 1 - $i; $j++) {
        if ($array[$j] > $array[$j + 1]) {
            $temp_value = $array[$j];
            $array[$j] = $array[$j + 1];
            $array[$j + 1] = $temp_value;
        }
    }
}
var_dump($array); // вывод x