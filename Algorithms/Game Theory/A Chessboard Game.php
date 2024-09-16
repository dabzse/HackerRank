<?php

/*
 * Complete the 'chessboardGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER x
 *  2. INTEGER y
 */

function chessboardGame($x, $y) {
    # Write your code here
    if (($x % 4 == 0) || ($x % 4 == 3) || ($y % 4 == 0) || ($y % 4 == 3)) {
        return "First";
    }
    else {
        return "Second";
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $x = intval($first_multiple_input[0]);
    $y = intval($first_multiple_input[1]);

    $result = chessboardGame($x, $y);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
