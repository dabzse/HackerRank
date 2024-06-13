<?php

/*
 * Complete the 'beautifulTriplets' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER d
 *  2. INTEGER_ARRAY arr
 */

function beautifulTriplets($d, $arr) {
    # Write your code here
    $count = 0;
    for($i = 0; $i < count($arr) - 2; $i++) {
        for($j = $i + 1; $j < count($arr) - 1; $j++) {
            if($arr[$j] - $arr[$i] == $d) {
                for($k = $j + 1; $k < count($arr); $k++) {
                    if($arr[$k] - $arr[$j] == $d) {
                        $count++;
                    }
                }
            }
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$d = intval($first_multiple_input[1]);
$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = beautifulTriplets($d, $arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
