<?php
function search($array, $search_number): bool
{
    if (count($array) == 0) {
        return false;
    }

    if (current($array) == $search_number) {
        return true;
    } else {
        for ($i = 1; $i < count($array); $i++) {
            if (next($array) == $search_number) {
                return true;
            }
        }
        return false;
    }
}
