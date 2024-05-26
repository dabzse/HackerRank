<?php

/*
 * Complete the 'findDigits' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function findDigits($n) {
    # Write your code here
    $count = 0;
    $n = strval($n);
    for($i = 0; $i < strlen($n); $i++) {
        if($n[$i] != '0' && $n % intval($n[$i]) == 0) {
            $count++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));
    $result = findDigits($n);
    fwrite($fptr, $result . "\n");
}

fclose($fptr);
