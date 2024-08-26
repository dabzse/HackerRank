<?php

/*
 * Complete the 'largestPermutation' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY arr
 */

function largestPermutation($k, $arr) {
    # Write your code here
    $n = count($arr);
    $value_to_index = array_flip($arr);

    for ($i = 0; $i < $n; $i++) {
        if ($k == 0) {
            break;
        }


        $target_value = $n - $i;

        if ($arr[$i] == $target_value) {
            continue;
        }

        $target_index = $value_to_index[$target_value];

        $value_to_index[$arr[$i]] = $target_index;
        $value_to_index[$target_value] = $i;

        $temp = $arr[$i];
        $arr[$i] = $arr[$target_index];
        $arr[$target_index] = $temp;

        $k--;
    }

    return $arr;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = largestPermutation($k, $arr);

fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);
