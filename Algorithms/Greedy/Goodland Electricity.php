<?php

/*
 * Complete the 'pylons' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY arr
 */

function pylons($k, $arr) {
    # Write your code here
    $n = count($arr);
    $pylons_count = 0;
    $i = 0;
    while ($i < $n) {
        $found = False;
        for ($j = min($i + $k - 1, $n - 1); $j >= $i - $k + 1; $j--) {
            if ($arr[$j] == 1) {
                $pylons_count += 1;
                $i = $j + $k;
                $found = True;
                break;
            }
        }

        if (!$found) {
            return -1;
        }
    }

    return $pylons_count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pylons($k, $arr);

fwrite($fptr, $result . "\n");
fclose($fptr);

