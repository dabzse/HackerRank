<?php

/*
 * Complete the 'fairRations' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY B as parameter.
 */

function fairRations($B) {
    # Write your code here
    $count = 0;
    for($i = 0; $i < count($B) - 1; $i++) {
        if($B[$i] % 2 == 1) {
            $count += 2;
            $B[$i] += 1;
            $B[$i + 1] += 1;
        }
    }
    if($B[count($B) - 1] % 2 == 1) {
        return "NO";
    }
    return (string)$count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$N = intval(trim(fgets(STDIN)));
$B_temp = rtrim(fgets(STDIN));
$B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = fairRations($B);

fwrite($fptr, $result . "\n");
fclose($fptr);
