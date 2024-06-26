<?php

/*
 * Complete the 'pageCount' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER p
 */

function pageCount($n, $p) {
    # Write your code here
    $front = floor($p / 2);
    $back = floor(($n / 2) - floor($p / 2));
    return min($front, $back);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$p = intval(trim(fgets(STDIN)));
$result = pageCount($n, $p);

fwrite($fptr, $result . "\n");
fclose($fptr);
