<?php

/*
 * Complete the 'maximumToys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY prices
 *  2. INTEGER k
 */

function maximumToys($prices, $k) {
    # Write your code here
    sort($prices);
    $count = 0;
    for ($i = 0; $i < count($prices); $i++) {
        if ($k - $prices[$i] >= 0) {
            $k -= $prices[$i];
            $count++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$prices_temp = rtrim(fgets(STDIN));

$prices = array_map('intval', preg_split('/ /', $prices_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumToys($prices, $k);

fwrite($fptr, $result . "\n");
fclose($fptr);
