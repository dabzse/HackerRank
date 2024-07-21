<?php

/*
 * Complete the 'palindromeIndex' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function palindromeIndex($s) {
    # Write your code here
    for ($i = 0; $i < strlen($s); $i++) {
        $temp = substr($s, 0, $i) . substr($s, $i + 1);
        if ($temp == strrev($temp)) {
            return $i;
        }
    }
    return -1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = palindromeIndex($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
