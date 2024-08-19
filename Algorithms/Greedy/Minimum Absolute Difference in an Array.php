<?php

/*
 * Complete the 'minimumAbsoluteDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function minimumAbsoluteDifference($arr) {
    # Write your code here
    sort($arr);
    $min = abs($arr[1] - $arr[0]);
    for ($i = 2; $i < count($arr); $i++) {
        $min = min($min, abs($arr[$i] - $arr[$i-1]));
    }
    return $min;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = minimumAbsoluteDifference($arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
