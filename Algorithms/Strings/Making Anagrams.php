<?php

/*
 * Complete the 'makingAnagrams' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. STRING s1
 *  2. STRING s2
 */

function makingAnagrams($s1, $s2) {
    # Write your code here
    $len1 = strlen($s1);
    $len2 = strlen($s2);
    $count = 0;
    for ($i = 0; $i < $len1; $i++) {
        $pos = strpos($s2, $s1[$i]);
        if ($pos !== False) {
            $s2[$pos] = ' ';
            $count++;
        }
    }
    return $len1 + $len2 - 2 * $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s1 = rtrim(fgets(STDIN), "\r\n");
$s2 = rtrim(fgets(STDIN), "\r\n");

$result = makingAnagrams($s1, $s2);

fwrite($fptr, $result . "\n");
fclose($fptr);
