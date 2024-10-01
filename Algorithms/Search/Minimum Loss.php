<?php

/*
 * Complete the 'minimumLoss' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts LONG_INTEGER_ARRAY price as parameter.
 */

function minimumLoss($price) {
    # Write your code here
    $min_loss = PHP_INT_MAX;
    $price_dict = [];

    foreach ($price as $i => $p) {
        $price_dict[$p] = $i;
    }

    $sorted_prices = $price;
    sort($sorted_prices);

    for ($i = 0; $i < count($sorted_prices) - 1; $i++) {
        $current_loss = $sorted_prices[$i + 1] - $sorted_prices[$i];

        if ($current_loss < $min_loss && $price_dict[$sorted_prices[$i + 1]] < $price_dict[$sorted_prices[$i]]) {
            $min_loss = $current_loss;
        }
    }

    return $min_loss;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$price_temp = rtrim(fgets(STDIN));
$price = array_map('intval', preg_split('/ /', $price_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = minimumLoss($price);

fwrite($fptr, $result . "\n");
fclose($fptr);
