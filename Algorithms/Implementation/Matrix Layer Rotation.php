<?php

/*
 * Complete the 'matrixRotation' function below.
 *
 * The function accepts following parameters:
 *  1. 2D_INTEGER_ARRAY matrix
 *  2. INTEGER r
 */

function matrixRotation($matrix, $r) {
    # Write your code here
    $m = count($matrix);
    $n = count($matrix[0]);
    $num_layers = min($m, $n) / 2;

    for ($layer = 0; $layer < $num_layers; $layer++) {
        $layer_elements = array();

        for ($j = $layer; $j < $n - $layer; $j++) {
            $layer_elements[] = $matrix[$layer][$j];
        }

        for ($i = $layer + 1; $i < $m - $layer; $i++) {
            $layer_elements[] = $matrix[$i][$n - $layer - 1];
        }

        for ($j = $n - $layer - 2; $j >= $layer; $j--) {
            $layer_elements[] = $matrix[$m - $layer - 1][$j];
        }

        for ($i = $m - $layer - 2; $i > $layer; $i--) {
            $layer_elements[] = $matrix[$i][$layer];
        }

        $effective_rotations = $r % count($layer_elements);
        $rotated_elements = array_merge(
            array_slice($layer_elements, $effective_rotations),
            array_slice($layer_elements, 0, $effective_rotations)
        );

        $idx = 0;

        for ($j = $layer; $j < $n - $layer; $j++) {
            $matrix[$layer][$j] = $rotated_elements[$idx++];
        }

        for ($i = $layer + 1; $i < $m - $layer; $i++) {
            $matrix[$i][$n - $layer - 1] = $rotated_elements[$idx++];
        }

        for ($j = $n - $layer - 2; $j >= $layer; $j--) {
            $matrix[$m - $layer - 1][$j] = $rotated_elements[$idx++];
        }

        for ($i = $m - $layer - 2; $i > $layer; $i--) {
            $matrix[$i][$layer] = $rotated_elements[$idx++];
        }
    }

    foreach ($matrix as $row) {
        echo implode(' ', $row) . "\n";
    }
}

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$m = intval($first_multiple_input[0]);
$n = intval($first_multiple_input[1]);
$r = intval($first_multiple_input[2]);

$matrix = array();

for ($i = 0; $i < $m; $i++) {
    $matrix_temp = rtrim(fgets(STDIN));

    $matrix[] = array_map('intval', preg_split('/ /', $matrix_temp, -1, PREG_SPLIT_NO_EMPTY));
}

matrixRotation($matrix, $r);
