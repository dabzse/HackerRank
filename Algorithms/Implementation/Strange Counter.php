<?php

/*
 * Complete the 'strangeCounter' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER t as parameter.
 */

function strangeCounter($t) {
    # Write your code here
    $a = 3;
    while ($t > $a) {
        $t -= $a;
        $a *= 2;
    }

    return ($a - $t + 1);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

$result = strangeCounter($t);

fwrite($fptr, $result . "\n");

fclose($fptr);
