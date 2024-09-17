<?php

/*
 * Complete the 'gameOfStones' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER n as parameter.
 */

function gameOfStones($n) {
    # Write your code here
    if ($n % 7 == 0 || $n % 7 == 1) {
        return "Second";
    }
    else {
        return "First";
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = gameOfStones($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
