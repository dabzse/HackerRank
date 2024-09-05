<?php

/*
 * Complete the 'chiefHopper' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function chiefHopper($arr) {
    # Write your code here
    $energy = 0;

    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $energy = (int)(($energy + $arr[$i] + 1) / 2);
    }

    return $energy;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = chiefHopper($arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
