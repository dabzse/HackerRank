<?php

/*
 * Complete the 'quickSort' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function quickSort($arr) {
    # Write your code here
    if (count($arr) <= 1) {
        return $arr;
    }
    else {
        $pivot = $arr[0];
        $less = [];
        $greater = [];
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] <= $pivot) {
                $less[] = $arr[$i];
            }
            else {
                $greater[] = $arr[$i];
            }
        }
        return array_merge(quickSort($less), [$pivot], quickSort($greater));
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = quickSort($arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
