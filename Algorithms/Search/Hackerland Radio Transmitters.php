<?php

/*
 * Complete the 'hackerlandRadioTransmitters' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY x
 *  2. INTEGER k
 */

function hackerlandRadioTransmitters($x, $k) {
    # Write your code here
    sort($x);
    $i = 0;
    $n = count($x);
    $transmitters = 0;

    while ($i < $n) {
        $transmitters++;
        $loc = $x[$i] + $k;

        while ($i < $n && $x[$i] <= $loc) {
            $i++;
        }

        $loc = $x[$i - 1] + $k;

        while ($i < $n && $x[$i] <= $loc) {
            $i++;
        }
    }
    return $transmitters;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$x_temp = rtrim(fgets(STDIN));
$x = array_map('intval', preg_split('/ /', $x_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = hackerlandRadioTransmitters($x, $k);

fwrite($fptr, $result . "\n");
fclose($fptr);
