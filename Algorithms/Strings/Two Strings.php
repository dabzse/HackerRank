<?php

/*
 * Complete the 'twoStrings' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s1
 *  2. STRING s2
 */

function twoStrings($s1, $s2) {
    # Write your code here
    $len1 = strlen($s1);
    $len2 = strlen($s2);
    $count = 0;
    $hash = array_fill(0, 26, 0);
    for ($i = 0; $i < $len2; $i++) {
        $hash[ord($s2[$i]) - ord('a')] = 1;
    }
    for ($i = 0; $i < $len1; $i++) {
        if ($hash[ord($s1[$i]) - ord('a')] == 1) {
            $count++;
        }
    }
    return $count > 0 ? "YES" : "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s1 = rtrim(fgets(STDIN), "\r\n");
    $s2 = rtrim(fgets(STDIN), "\r\n");

    $result = twoStrings($s1, $s2);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
