<?php

/*
 * Complete the 'maximizingXor' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER l
 *  2. INTEGER r
 */

function maximizingXor($l, $r) {
    # Write your code here
    $max = 0;
    for ($i = $l; $i <= $r; $i++) {
        for ($j = $l; $j <= $r; $j++) {
            $max = max($max, $i ^ $j);
        }
    }
    return $max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$l = intval(trim(fgets(STDIN)));
$r = intval(trim(fgets(STDIN)));

$result = maximizingXor($l, $r);

fwrite($fptr, $result . "\n");
fclose($fptr);
