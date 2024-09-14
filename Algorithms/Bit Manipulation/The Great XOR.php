<?php

/*
 * Complete the 'theGreatXor' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER x as parameter.
 */

function theGreatXor($x) {
    # Write your code here
    $result = 0;
    $bit_position = 0;

    while ($x > 0) {
        if (($x & 1) == 0) {
            $result += (1 << $bit_position);
        }
        $bit_position++;
        $x >>= 1;
    }

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $x = intval(trim(fgets(STDIN)));

    $result = theGreatXor($x);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
