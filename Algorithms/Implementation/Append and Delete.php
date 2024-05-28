<?php

/*
 * Complete the 'appendAndDelete' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. STRING t
 *  3. INTEGER k
 */

function appendAndDelete($s, $t, $k) {
    # Write your code here

    $length = 0;
    $minLen = min(strlen($s), strlen($t));
    for ($i = 0; $i < $minLen; $i++) {
        if ($s[$i] == $t[$i]) $length++;
        else break;
    }

    $ops = strlen($s) + strlen($t) - 2 * $length;

    return ($ops <= $k && ($k - $ops) % 2 == 0) || $k >= strlen($s) + strlen($t) ? "Yes" : "No";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");
$t = rtrim(fgets(STDIN), "\r\n");
$k = intval(trim(fgets(STDIN)));
$result = appendAndDelete($s, $t, $k);

fwrite($fptr, $result . "\n");
fclose($fptr);
