<?php

/*
 * Complete the 'andProduct' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. LONG_INTEGER a
 *  2. LONG_INTEGER b
 */

function andProduct($a, $b) {
    # Write your code here
    $shift_count = 0;

    while ($a != $b) {
        $a >>= 1;
        $b >>= 1;
        $shift_count++;
    }

    return $a << $shift_count;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

for ($n_itr = 0; $n_itr < $n; $n_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $a = intval($first_multiple_input[0]);
    $b = intval($first_multiple_input[1]);

    $result = andProduct($a, $b);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
