<?php

/*
 * Complete the 'chocolateFeast' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER c
 *  3. INTEGER m
 */

function chocolateFeast($n, $c, $m) {
    # Write your code here
    $count = (int)($n / $c);
    $wrappers = $count;

    while ($wrappers >= $m) {
        $additionalChocolates = (int)($wrappers / $m);
        $count += $additionalChocolates;
        $wrappers = $additionalChocolates + ($wrappers % $m);
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);
    $c = intval($first_multiple_input[1]);
    $m = intval($first_multiple_input[2]);

    $result = chocolateFeast($n, $c, $m);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
