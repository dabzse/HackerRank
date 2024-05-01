<?php

/*
 * Complete the 'getTotalX' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */

function getTotalX($a, $b) {
    # Write your code here
    $count = 0;
    for($i = min($a); $i <= max($b); $i++) {
        $flag = 1;
        foreach($a as $val) {
            if($i % $val != 0) {
                $flag = 0;
                break;
            }
        }
        if($flag == 1) {
            foreach($b as $val) {
                if($val % $i != 0) {
                    $flag = 0;
                    break;
                }
            }
        }
        if($flag == 1) {
            $count++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$m = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$brr_temp = rtrim(fgets(STDIN));
$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($arr, $brr);

fwrite($fptr, $total . "\n");
fclose($fptr);
