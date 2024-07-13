<?php

/*
 * Complete the 'funnyString' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function funnyString($s) {
    # Write your code here
    for ($i = 1; $i < strlen($s); $i++) {
        if (abs(ord($s[$i]) - ord($s[$i-1])) != abs(ord($s[strlen($s)-$i]) - ord($s[strlen($s)-$i-1]))) {
            return 'Not Funny';
        }
    }
    return 'Funny';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = funnyString($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
