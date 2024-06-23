<?php

/*
 * Complete the 'cavityMap' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function cavityMap($grid) {
    # Write your code here
    $n = count($grid);
    for ($i = 1; $i < $n - 1; $i++) {
        for ($j = 1; $j < strlen($grid[0]) - 1; $j++) {
            if ($grid[$i][$j] > max($grid[$i][$j - 1], $grid[$i][$j + 1], $grid[$i - 1][$j], $grid[$i + 1][$j])) {
                $grid[$i][$j] = 'X';
            }
        }
    }
    return $grid;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$grid = array();

for ($i = 0; $i < $n; $i++) {
    $grid_item = rtrim(fgets(STDIN), "\r\n");
    $grid[] = $grid_item;
}

$result = cavityMap($grid);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
