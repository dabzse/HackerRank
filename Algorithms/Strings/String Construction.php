<?php

/*
 * Complete the 'stringConstruction' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function stringConstruction($s) {
    # Write your code here
    $cost = 0;
    $unique = array_unique(str_split($s));
    $cost = count($unique);
    return $cost;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = stringConstruction($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
