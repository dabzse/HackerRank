<?php

/*
 * Complete the 'larrysArray' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY A as parameter.
 */

function larrysArray($A) {
    # Write your code here
    $n = count($A);
    $inversions = 0;

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($A[$i] > $A[$j]) {
                $inversions++;
            }
        }
    }

    return ($inversions % 2 == 0) ? "YES" : "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $A_temp = rtrim(fgets(STDIN));

    $A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = larrysArray($A);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
