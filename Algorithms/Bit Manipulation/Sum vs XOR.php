<?php

/*
 * Complete the 'sumXor' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER n as parameter.
 */

function sumXor($n) {
    # Write your code here
    $count = 0;
    while ($n) {
        if ($n % 2 == 0) {
            $count += 1;
        }
        $n = (int)($n / 2);
    }
    return pow(2, $count);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$result = sumXor($n);

fwrite($fptr, $result . "\n");
fclose($fptr);
