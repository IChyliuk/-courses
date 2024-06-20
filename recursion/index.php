<?php
function recursion($segments_array, $count = 0): array
{
    if ($count >= count($segments_array) - 1) {
        return $segments_array;
    }
    $check = $segments_array[$count][1] >= $segments_array[$count + 1][0];
    if ($check) {
        $segments_array[$count][1] = $segments_array[$count + 1][1];
        array_splice($segments_array, $count + 1, 1);
        return recursion($segments_array, $count);
    } else {
        $count++;
        return recursion($segments_array, $count);
    }
}
