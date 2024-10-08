<?php

/*
 * Complete the 'towerBreakers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 */

function towerBreakers($n, $m) {
    # Write your code here
    if ($m == 1) {
        return 2;
    }
    elseif ($n % 2 == 0) {
        return 2;
    }
    else {
        return 1;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $m = intval($first_multiple_input[1]);

    $result = towerBreakers($n, $m);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
