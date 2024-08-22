<?php

/*
 * Complete the 'maximumPerimeterTriangle' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY sticks as parameter.
 */

function maximumPerimeterTriangle($sticks) {
    # Write your code here
    sort($sticks);
    for ($i = count($sticks) - 1; $i >= 2; $i--){
        if ($sticks[$i] < $sticks[$i - 1] + $sticks[$i - 2] ) {
            return [$sticks[$i - 2], $sticks[$i - 1], $sticks[$i]];
        }
    }
    return [-1];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$sticks_temp = rtrim(fgets(STDIN));

$sticks = array_map('intval', preg_split('/ /', $sticks_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumPerimeterTriangle($sticks);

fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);
