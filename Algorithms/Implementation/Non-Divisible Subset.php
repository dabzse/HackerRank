<?php

/*
 * Complete the 'nonDivisibleSubset' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY s
 */

function nonDivisibleSubset($k, $s) {
    # Write your code here
    $count = array_fill(0, $k, 0);
    foreach ($s as $num) {
        $count[$num % $k]++;
    }

    $result = min($count[0], 1);

    for ($i = 1; $i <= floor($k / 2); $i++) {
        if ($i == $k - $i) {
            $result += 1;
        }
        else {
            $result += max($count[$i], $count[$k - $i]);
        }
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$s_temp = rtrim(fgets(STDIN));

$s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = nonDivisibleSubset($k, $s);

fwrite($fptr, $result . "\n");
fclose($fptr);
