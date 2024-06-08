<?php

/*
 * Complete the 'organizingContainers' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts 2D_INTEGER_ARRAY container as parameter.
 */

function organizingContainers($container) {
    # Write your code here
    $sum_row = array_map(function($row) {
        return array_sum($row);
    }, $container);
    $sum_col = array_map(function($col) use ($container) {
        return array_sum(array_column($container, $col));
    }, array_keys($container[0]));
    sort($sum_row);
    sort($sum_col);
    if ($sum_row === $sum_col) return "Possible";
    else return "Impossible";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $container = array();

    for ($i = 0; $i < $n; $i++) {
        $container_temp = rtrim(fgets(STDIN));
        $container[] = array_map('intval', preg_split('/ /', $container_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $result = organizingContainers($container);
    fwrite($fptr, $result . "\n");
}

fclose($fptr);
