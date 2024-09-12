<?php

/*
 * Complete the 'sansaXor' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function sansaXor($arr) {
    # Write your code here
    $n = count($arr);

    if ($n % 2 == 0) {
        return 0;
    }
    else {
        $result = 0;
        for ($i = 0; $i < $n; $i += 2) {
            $result ^= $arr[$i];
        }
        return $result;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $arr_temp = rtrim(fgets(STDIN));
    $arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = sansaXor($arr);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
