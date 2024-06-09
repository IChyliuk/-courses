<?php
$array = array(0, -1, 1, 2, 3, 4, 5, 6); // массив элементов
var_dump($array);
bubble_sort($array, $time);
function bubble_sort(&$array, &$time): void
{
    $start = microtime(true);
    $i = 0;
    $check = true;
    $count = count($array);
    while ($check && $i < $count) {
        $check = false;
        for ($j = 0; $j < $count - 1 - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp_value = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp_value;
                $check = true;
            }
        }
        $i++;
    }
    $time = round(microtime(true) - $start, 10);
}

var_dump($array) . PHP_EOL;
echo 'Время выполнения - ' . $time . PHP_EOL;