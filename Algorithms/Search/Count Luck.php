<?php

/*
 * Complete the 'countLuck' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING_ARRAY matrix
 *  2. INTEGER k
 */

function countLuck($matrix, $k) {
    # Write your code here
    $n = count($matrix);
    $m = strlen($matrix[0]);
    $start = [];
    $end = [];

    $DIRECTIONS = [[0, 1], [1, 0], [0, -1], [-1, 0]];

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($matrix[$i][$j] == 'M') {
                $start = [$i, $j];
            }
            if ($matrix[$i][$j] == '*') {
                $end = [$i, $j];
            }
        }
    }

    $dfs = function ($x, $y) use (&$matrix, $n, $m, &$visited, $DIRECTIONS, &$dfs) {
        if ($matrix[$x][$y] == '*') {
            return [True, 0];
        }

        $visited[$x][$y] = True;

        $valid_moves = 0;
        foreach ($DIRECTIONS as $dir) {
            $nx = $x + $dir[0];
            $ny = $y + $dir[1];
            if ($nx >= 0 && $nx < $n && $ny >= 0 && $ny < $m && $matrix[$nx][$ny] != 'X' && !$visited[$nx][$ny]) {
                $valid_moves++;
            }
        }

        $junctions = 0;
        foreach ($DIRECTIONS as $dir) {
            $nx = $x + $dir[0];
            $ny = $y + $dir[1];
            if ($nx >= 0 && $nx < $n && $ny >= 0 && $ny < $m && $matrix[$nx][$ny] != 'X' && !$visited[$nx][$ny]) {
                [$found_exit, $sub_junctions] = $dfs($nx, $ny);
                if ($found_exit) {
                    $junctions += $sub_junctions;
                    if ($valid_moves > 1) {
                        $junctions++;
                    }
                    return [True, $junctions];
                }
            }
        }

        return [False, 0];
    };

    $visited = array_fill(0, $n, array_fill(0, $m, False));

    [$exit_found, $junctions_count] = $dfs($start[0], $start[1]);

    if ($junctions_count == $k) {
        return "Impressed";
    }
    else {
        return "Oops!";
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);
    $m = intval($first_multiple_input[1]);

    $matrix = array();

    for ($i = 0; $i < $n; $i++) {
        $matrix_item = rtrim(fgets(STDIN), "\r\n");
        $matrix[] = $matrix_item;
    }

    $k = intval(trim(fgets(STDIN)));

    $result = countLuck($matrix, $k);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
