<?php

/*
 * Complete the 'pokerNim' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY c
 */

function pokerNim($k, $c) {
    # Write your code here
    $x = 0;
    foreach ($c as $i) {
        $x ^= $i;
    }
    if ($x == 0) {
        return "Second";
    }
    else {
        return "First";
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $k = intval($first_multiple_input[1]);

    $c_temp = rtrim(fgets(STDIN));

    $c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = pokerNim($k, $c);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
