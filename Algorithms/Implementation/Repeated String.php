<?php

/*
 * Complete the 'repeatedString' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. LONG_INTEGER n
 */

function repeatedString($s, $n) {
    # Write your code here
    $count = 0;
    for($i = 0; $i < strlen($s); $i++) {
        if($s[$i] == 'a') $count++;
    }
    $count = $count * floor($n/strlen($s));
    for($i = 0; $i < $n % strlen($s); $i++) {
        if($s[$i] == 'a') $count++;
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$n = intval(trim(fgets(STDIN)));

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($fptr);
