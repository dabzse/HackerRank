<?php

/*
 * Complete the 'beautifulPairs' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY A
 *  2. INTEGER_ARRAY B
 */

function beautifulPairs($A, $B) {
    # Write your code here
    $countA = array_count_values($A);
    $countB = array_count_values($B);

    $matches = 0;

    foreach ($countA as $num => $count) {
        if (isset($countB[$num])) {
            $matches += min($count, $countB[$num]);
        }
    }

    if ($matches == count($A)) {
        return $matches - 1;
    }
    else {
        return $matches + 1;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$A_temp = rtrim(fgets(STDIN));
$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

$B_temp = rtrim(fgets(STDIN));
$B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = beautifulPairs($A, $B);

fwrite($fptr, $result . "\n");
fclose($fptr);
