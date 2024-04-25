<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function miniMaxSum($arr) {
    # Write your code here
    sort($arr);
    $min = array_sum(array_slice($arr, 0, 4));
    $max = array_sum(array_slice($arr, 1, 4));
    echo $min . " " . $max;

}

$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
miniMaxSum($arr);
