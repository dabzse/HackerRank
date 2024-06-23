<?php

/*
 * Complete the 'stones' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER a
 *  3. INTEGER b
 */

function stones($n, $a, $b) {
    # Write your code here
    $result = array();
    for ($i = 0; $i < $n; $i++) {
        $result[] = $a * ($n - 1 - $i) + $b * $i;
    }
    $result = array_unique($result);
    sort($result);
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$T = intval(trim(fgets(STDIN)));

for ($T_itr = 0; $T_itr < $T; $T_itr++) {
    $n = intval(trim(fgets(STDIN)));
    $a = intval(trim(fgets(STDIN)));
    $b = intval(trim(fgets(STDIN)));

    $result = stones($n, $a, $b);

    fwrite($fptr, implode(" ", $result) . "\n");
}

fclose($fptr);
