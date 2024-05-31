<?php

/*
 * Complete the 'cutTheSticks' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function cutTheSticks($arr) {
    # Write your code here

    $result = [];

    while(count($arr) > 0) {
        $result[] = count($arr);
        $min = min($arr);
        foreach($arr as $key => $value) {
            if($value == $min) {
                unset($arr[$key]);
            }
            else {
                $arr[$key] -= $min;
            }
        }
    }

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = cutTheSticks($arr);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
