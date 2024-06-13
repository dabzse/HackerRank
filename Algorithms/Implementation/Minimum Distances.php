<?php

/*
 * Complete the 'minimumDistances' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function minimumDistances($a) {
    # Write your code here
    $d = [];
    foreach ($a as $i => $val_i) {
        foreach ($a as $j => $val_j) {
            if ($i != $j && $val_i == $val_j) {
                $d[] = abs($i - $j);
            }
        }
    }
    if (!empty($d)) {
        return min($d);
    }
    else {
        return -1;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$a_temp = rtrim(fgets(STDIN));
$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = minimumDistances($a);

fwrite($fptr, $result . "\n");
fclose($fptr);
