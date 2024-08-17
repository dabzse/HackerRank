<?php

/*
 * Complete the 'printShortestPath' function below.
 *
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER i_start
 *  3. INTEGER j_start
 *  4. INTEGER i_end
 *  5. INTEGER j_end
 */

function printShortestPath($n, $i_start, $j_start, $i_end, $j_end) {
    # Print the distance along with the sequence of moves.
    $directions = [
        [-2, -1, "UL"], [-2, 1, "UR"],
        [0, 2, "R"], [2, 1, "LR"],
        [2, -1, "LL"], [0, -2, "L"]
    ];

    $queue = new SplQueue();
    $queue->enqueue([[$i_start, $j_start], []]);
    $visited = [];
    $visited["$i_start,$j_start"] = True;

    while (!$queue->isEmpty()) {
        list($current, $path) = $queue->dequeue();
        list($i, $j) = $current;

        if ($i == $i_end && $j == $j_end) {
            echo count($path) . "\n";
            echo implode(" ", $path) . "\n";
            return;
        }

        foreach ($directions as $direction) {
            list($di, $dj, $move) = $direction;
            $new_i = $i + $di;
            $new_j = $j + $dj;
            $new_position = "$new_i,$new_j";

            if ($new_i >= 0 && $new_i < $n && $new_j >= 0 && $new_j < $n && !isset($visited[$new_position])) {
                $new_path = $path;
                $new_path[] = $move;
                $queue->enqueue([[$new_i, $new_j], $new_path]);
                $visited[$new_position] = True;
            }
        }
    }

    echo "Impossible\n";
}

$n = intval(trim(fgets(STDIN)));

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$i_start = intval($first_multiple_input[0]);
$j_start = intval($first_multiple_input[1]);

$i_end = intval($first_multiple_input[2]);
$j_end = intval($first_multiple_input[3]);

printShortestPath($n, $i_start, $j_start, $i_end, $j_end);
