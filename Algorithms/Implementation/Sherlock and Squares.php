<?php

/*
 * Complete the 'squares' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER a
 *  2. INTEGER b
 */

function squares($a, $b) {
    # Write your code here


    $count = 0;
    $start = (int)($a**0.5);
    if ($start**2 < $a) {
        $start += 1;
    }
    for ($i = $start; $i**2 <= $b; $i++) {
        $count += 1;
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $a = intval($first_multiple_input[0]);
    $b = intval($first_multiple_input[1]);

    $result = squares($a, $b);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
