<?php

/*
 * Complete the 'missingNumbers' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY arr
 *  2. INTEGER_ARRAY brr
 */

function missingNumbers($arr, $brr) {
    # Write your code here
    $freq = array_count_values($brr);
    foreach ($arr as $num) {
        $freq[$num]--;
    }
    $result = [];
    foreach ($freq as $num => $count) {
        if ($count > 0) {
            $result[] = $num;
        }
    }
    sort($result);
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$m = intval(trim(fgets(STDIN)));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = missingNumbers($arr, $brr);

fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);

