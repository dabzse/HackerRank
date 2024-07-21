<?php

/*
 * Complete the 'gameOfThrones' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function gameOfThrones($s) {
    # Write your code here
    $length = strlen($s);
    $count = array_count_values(str_split($s));
    $odd = 0;
    foreach ($count as $key => $value) {
        if ($value % 2 != 0) {
            $odd++;
        }
    }
    return $odd <= 1 ? "YES" : "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = gameOfThrones($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
