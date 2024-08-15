<?php

/*
 * Complete the 'insertionSort2' function below.
 *
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY arr
 */

function insertionSort2($n, $arr) {
    # Write your code here
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
        echo implode(' ', $arr) . "\n";
    }
}

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

insertionSort2($n, $arr);
