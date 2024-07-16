<?php

/*
 * Complete the 'beautifulBinaryString' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING b as parameter.
 */

function beautifulBinaryString($b) {
    # Write your code here
    $count = 0;
    $i = 0;
    while ($i < strlen($b) - 2) {
        if ($b[$i] == '0' && $b[$i + 1] == '1' && $b[$i + 2] == '0') {
            $count++;
            $i += 3;
        }
        else {
            $i++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$b = rtrim(fgets(STDIN), "\r\n");

$result = beautifulBinaryString($b);

fwrite($fptr, $result . "\n");
fclose($fptr);
