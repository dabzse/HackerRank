<?php

/*
 * Complete the 'pangrams' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function pangrams($s) {
    # Write your code here
    $s = strtolower($s);
    $alphabet = range('a', 'z');
    foreach($alphabet as $letter) {
        if (!str_contains($s, $letter)) {
            return "not pangram";
        }
    }
    return "pangram";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");
$result = pangrams($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
