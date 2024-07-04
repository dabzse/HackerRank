<?php

/*
 * Complete the 'camelcase' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function camelcase($s) {
    # Write your code here
    $count = 1;
    for($i = 0; $i < strlen($s); $i++) {
        if($s[$i] >= 'A' && $s[$i] <= 'Z') {
            $count++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");
$result = camelcase($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
