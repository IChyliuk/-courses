<?php
include "index.php";
echo 'First test: ' . (first_test() ? 'Passed' : 'Failed') . PHP_EOL;
echo 'Second test: ' . (second_test() ? 'Passed' : 'Failed') . PHP_EOL;
echo 'Third test: ' . (third_test() ? 'Passed' : 'Failed') . PHP_EOL;
function first_test(): bool
{
    $segments = [
        [
            2,
            4
        ],
        [
            3,
            7
        ],
        [
            8,
            9
        ]
    ];
    $expected = [
        [
            2,
            7
        ],
        [
            8,
            9
        ]
    ];
    if(recursion($segments, 0) == $expected) {
        return true;
    }
    else {
        return false;
    }
}
function second_test(): bool{
    $segments = [
        [
            0,
            3
        ],
        [
            3,
            5
        ],
        [
            4,
            10
        ]
    ];
    $expected = [
        [
            0,
            10
        ]
    ];
    if(recursion($segments, 0) == $expected) {
        return true;
    }
    else {
        return false;
    }
}
function third_test(): bool{
    $segments = [
        [
            0,
            2
        ],
        [
            4,
            5
        ],
        [
            8,
            10
        ]
    ];
    $expected = [
        [
            0,
            2
        ],
        [
            4,
            5
        ],
        [
            8,
            10
        ]
    ];
    if(recursion($segments, 0) == $expected) {
        return true;
    }
    else {
        return false;
    }
}