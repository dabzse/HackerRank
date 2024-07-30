<?php

/*
 * Complete the 'bigSorting' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts STRING_ARRAY unsorted as parameter.
 */

function bigSorting($unsorted) {
    # Write your code here
    usort($unsorted, function($a, $b) {
        $lenA = strlen($a);
        $lenB = strlen($b);

        if ($lenA === $lenB) {
            return strcmp($a, $b);
        }

        return $lenA - $lenB;
    });

    return $unsorted;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$unsorted = array();

for ($i = 0; $i < $n; $i++) {
    $unsorted_item = rtrim(fgets(STDIN), "\r\n");
    $unsorted[] = $unsorted_item;
}

$result = bigSorting($unsorted);

fwrite($fptr, implode("\n", $result) . "\n");
fclose($fptr);
