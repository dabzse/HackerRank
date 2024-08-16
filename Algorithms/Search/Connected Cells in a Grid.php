<?php

/*
 * Complete the 'connectedCell' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY matrix as parameter.
 */

function connectedCell($matrix) {
    # Write your code here
    $max_region = 0;
    $n = count($matrix);
    $m = count($matrix[0]);
    $visited = array_fill(0, $n, array_fill(0, $m, False));

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($matrix[$i][$j] == 1 && !$visited[$i][$j]) {
                $region = 0;
                dfs($matrix, $i, $j, $n, $m, $visited, $region);
                $max_region = max($max_region, $region);
            }
        }
    }
    return $max_region;
}

function dfs($matrix, $i, $j, $n, $m, &$visited, &$region) {
    if ($i < 0 || $i >= $n || $j < 0 || $j >= $m || $matrix[$i][$j] == 0 || $visited[$i][$j]) {
        return;
    }

    $visited[$i][$j] = True;
    $region++;

    $directions = [
        [-1, -1], [-1, 0], [-1, 1],
        [0, -1],         [0, 1],
        [1, -1], [1, 0], [1, 1]
    ];

    foreach ($directions as $direction) {
        $new_i = $i + $direction[0];
        $new_j = $j + $direction[1];
        dfs($matrix, $new_i, $new_j, $n, $m, $visited, $region);
    }
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$m = intval(trim(fgets(STDIN)));

$matrix = array();

for ($i = 0; $i < $n; $i++) {
    $matrix_temp = rtrim(fgets(STDIN));

    $matrix[] = array_map('intval', preg_split('/ /', $matrix_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = connectedCell($matrix);

fwrite($fptr, $result . "\n");
fclose($fptr);
