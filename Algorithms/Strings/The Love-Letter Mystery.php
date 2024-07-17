<?php

/*
 * Complete the 'theLoveLetterMystery' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function theLoveLetterMystery($s) {
    # Write your code here
    $sum = 0;
    for ($i = 0; $i < strlen($s) / 2; $i++) {
        $sum += abs(ord($s[$i]) - ord($s[strlen($s) - 1 - $i]));
    }
    return (int)$sum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = theLoveLetterMystery($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
