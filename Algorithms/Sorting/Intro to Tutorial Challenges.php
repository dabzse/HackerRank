<?php

/*
 * Complete the 'introTutorial' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER V
 *  2. INTEGER_ARRAY arr
 */

function introTutorial($V, $arr) {
    # Write your code here
    return array_search($V, $arr);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$V = intval(trim(fgets(STDIN)));
$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = introTutorial($V, $arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
