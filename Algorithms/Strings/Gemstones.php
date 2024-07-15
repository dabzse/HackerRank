<?php

/*
 * Complete the 'gemstones' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING_ARRAY arr as parameter.
 */

function gemstones($arr) {
    # Write your code here
    $common_elements = array_fill_keys(range('a', 'z'), True);

    foreach ($arr as $rock) {
        $current_rock_set = array_fill_keys(str_split($rock), True);

        foreach ($common_elements as $char => $val) {
            if (!isset($current_rock_set[$char])) {
                unset($common_elements[$char]);
            }
        }
    }
    return count($common_elements);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_item = rtrim(fgets(STDIN), "\r\n");
    $arr[] = $arr_item;
}

$result = gemstones($arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
