<?php
function search($array, $search_number): bool
{
    if (count($array) == 0) {
        return false;
    }

    while (true) {
        if (current($array) == $search_number) {
            return true;
        }
        $next = next($array);
        if ($next === false) {
            return false;
        }
    }
}
