<?php

/*
 * Complete the 'counterGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts LONG_INTEGER n as parameter.
 */

function counterGame($n) {
    # Write your code here
    $turn_count = 0;

    # maybe it will be better to use switch-case here
    # but at the moment works...
    while ($n > 1) {
        if (($n & ($n - 1)) == 0) {
            $n /= 2;
        }
        else {
            $n -= pow(2, floor(log($n, 2)));
        }
        $turn_count++;
    }

    return ($turn_count % 2 == 1) ? "Louise" : "Richard";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = counterGame($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
