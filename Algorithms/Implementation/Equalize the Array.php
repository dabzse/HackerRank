<?php

/*
 * Complete the 'equalizeArray' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function equalizeArray($arr) {
    # Write your code here
    $counts = array_count_values($arr);
    $max_count = max($counts);
    return count($arr) - $max_count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = equalizeArray($arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
