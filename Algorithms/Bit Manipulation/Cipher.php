<?php

/*
 * Complete the 'cipher' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. STRING s
 */

function cipher($k, $s) {
    # Write your code here
    $n = strlen($s);
    $result = array();
    $xor_accumulated = 0;

    for ($i = 0; $i < $n - $k + 1; $i++) {
        $current_bit = intval($s[$i]) ^ $xor_accumulated;
        $result[$i] = $current_bit;

        $xor_accumulated ^= $current_bit;

        if ($i >= $k - 1) {
            $xor_accumulated ^= $result[$i - $k + 1];
        }
    }

    return implode('', $result);

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$s = rtrim(fgets(STDIN), "\r\n");

$result = cipher($k, $s);

fwrite($fptr, $result . "\n");
fclose($fptr);
