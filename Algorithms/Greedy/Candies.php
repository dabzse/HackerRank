<?php

/*
 * Complete the 'candies' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY arr
 */

function candies($n, $arr) {
    # Write your code here
    $left = array_fill(0, $n, 1);
    $right = array_fill(0, $n, 1);
    $total = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($arr[$i] > $arr[$i - 1]) {
            $left[$i] = $left[$i - 1] + 1;
        }
    }
    for ($i = $n - 2; $i >= 0; $i--) {
        if ($arr[$i] > $arr[$i + 1]) {
            $right[$i] = $right[$i + 1] + 1;
        }
    }
    for ($i = 0; $i < $n; $i++) {
        $total += max($left[$i], $right[$i]);
    }
    return $total;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_item = intval(trim(fgets(STDIN)));
    $arr[] = $arr_item;
}

$result = candies($n, $arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
