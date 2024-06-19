<?php

/*
 * Complete the 'workbook' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER k
 *  3. INTEGER_ARRAY arr
 */

function workbook($n, $k, $arr) {
    # Write your code here
    $count = 0;
    $page = 1;

    for ($i = 0; $i < $n; $i++) {
        $problems = $arr[$i];

        for ($j = 1; $j <= $problems; $j++) {
            if ($j == $page) {
                $count++;
            }
            if ($j % $k == 0 || $j == $problems) {
                $page++;
            }
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = workbook($n, $k, $arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
