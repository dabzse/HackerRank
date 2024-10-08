<?php

/*
 * Complete the 'twoArrays' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY A
 *  3. INTEGER_ARRAY B
 */

function twoArrays($k, $A, $B) {
    # Write your code here
    sort($A);
    sort($B);
    $result = "YES";
    for ($i = 0; $i < count($A); $i++) {
        if ($A[$i] + $B[count($B) - 1 - $i] < $k) {
            $result = "NO";
            break;
        }
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);
    $k = intval($first_multiple_input[1]);

    $A_temp = rtrim(fgets(STDIN));
    $A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

    $B_temp = rtrim(fgets(STDIN));
    $B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = twoArrays($k, $A, $B);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
