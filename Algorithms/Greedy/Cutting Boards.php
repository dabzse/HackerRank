<?php

/*
 * Complete the 'boardCutting' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY cost_y
 *  2. INTEGER_ARRAY cost_x
 */

function boardCutting($cost_y, $cost_x) {
    # Write your code here
    rsort($cost_y);
    rsort($cost_x);

    $horizontal_pieces = 1;
    $vertical_pieces = 1;

    $total_cost = 0;
    $i = 0;
    $j = 0;

    while ($i < count($cost_y) && $j < count($cost_x)) {
        if ($cost_y[$i] > $cost_x[$j] || ($cost_y[$i] == $cost_x[$j] && $horizontal_pieces <= $vertical_pieces)) {
            $total_cost += $cost_y[$i] * $vertical_pieces;
            $horizontal_pieces++;
            $i++;
        }
        else {
            $total_cost += $cost_x[$j] * $horizontal_pieces;
            $vertical_pieces++;
            $j++;
        }
    }

    while ($i < count($cost_y)) {
        $total_cost += $cost_y[$i] * $vertical_pieces;
        $i++;
    }

    while ($j < count($cost_x)) {
        $total_cost += $cost_x[$j] * $horizontal_pieces;
        $j++;
    }

    return $total_cost % (10**9 + 7);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $m = intval($first_multiple_input[0]);
    $n = intval($first_multiple_input[1]);

    $cost_y_temp = rtrim(fgets(STDIN));
    $cost_y = array_map('intval', preg_split('/ /', $cost_y_temp, -1, PREG_SPLIT_NO_EMPTY));

    $cost_x_temp = rtrim(fgets(STDIN));
    $cost_x = array_map('intval', preg_split('/ /', $cost_x_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = boardCutting($cost_y, $cost_x);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
