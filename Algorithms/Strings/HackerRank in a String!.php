<?php

/*
 * Complete the 'hackerrankInString' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function hackerrankInString($s) {
    # Write your code here
    $hackerrank = "hackerrank";
    $i = 0;
    $chars = str_split($s);
    foreach ($chars as $c) {
        if ($c == $hackerrank[$i]) {
            $i++;
            if ($i == strlen($hackerrank)) {
                return "YES";
            }
        }
    }
    return "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = hackerrankInString($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
