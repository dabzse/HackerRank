<?php

/*
 * Complete the 'serviceLane' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. 2D_INTEGER_ARRAY cases
 */

function serviceLane($width, $cases) {
    # Write your code here
    global $width;
    $results = [];

    foreach ($cases as $case) {
        $start = $case[0];
        $end = $case[1];
        $minWidth = PHP_INT_MAX;

        for ($i = $start; $i <= $end; $i++) {
            if ($width[$i] < $minWidth) {
                $minWidth = $width[$i];
            }
        }

        $results[] = $minWidth;
    }
    return $results;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$t = intval($first_multiple_input[1]);

$width_temp = rtrim(fgets(STDIN));
$width = array_map('intval', preg_split('/ /', $width_temp, -1, PREG_SPLIT_NO_EMPTY));
$cases = array();

for ($i = 0; $i < $t; $i++) {
    $cases_temp = rtrim(fgets(STDIN));
    $cases[] = array_map('intval', preg_split('/ /', $cases_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = serviceLane($n, $cases);

fwrite($fptr, implode("\n", $result) . "\n");
fclose($fptr);
