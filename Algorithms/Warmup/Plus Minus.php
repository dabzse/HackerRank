<?php

/*
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr) {
    # Write your code here
    $positive = 0;
    $negative = 0;
    $zero = 0;
    foreach ($arr as $value) {
        if ($value > 0)
            $positive++;
        elseif ($value < 0)
            $negative++;
        else
            $zero++;
    }
    echo number_format($positive / count($arr), 6) . "\n";
    echo number_format($negative / count($arr), 6) . "\n";
    echo number_format($zero / count($arr), 6) . "\n";
}

$n = intval(trim(fgets(STDIN)));
$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
plusMinus($arr);
