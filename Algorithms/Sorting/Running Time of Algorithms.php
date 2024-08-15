<?php

/*
 * Complete the 'runningTime' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function runningTime($arr) {
    # Write your code here
    $count = 0;
    for($i = 1; $i < count($arr); $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
            $count++;
        }
        $arr[$j + 1] = $key;
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = runningTime($arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
