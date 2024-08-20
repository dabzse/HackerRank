<?php

/*
 * Complete the 'gridChallenge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function gridChallenge($grid) {
    # Write your code here
    for ($i = 0; $i < count($grid); $i++) {
        $grid[$i] = str_split($grid[$i]);
        sort($grid[$i]);
    }

    $n = count($grid);
    $m = count($grid[0]);

    for ($col = 0; $col < $m; $col++) {
        for ($row = 1; $row < $n; $row++) {
            if ($grid[$row][$col] < $grid[$row - 1][$col]) {
                return "NO";
            }
        }
    }

    return "YES";

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
