<?php

/*
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers($a) {
    # Write your code here
    sort($a);
    $maxi = 0;
    $start = 0;

    for ($i = 1; $i < count($a); $i++) {
        while ($a[$i] - $a[$start] > 1) {
            $start++;
        }
        $maxi = max($maxi, $i - $start + 1);
    }

    return $maxi;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$a_temp = rtrim(fgets(STDIN));
$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = pickingNumbers($a);

fwrite($fptr, $result . "\n");
fclose($fptr);
