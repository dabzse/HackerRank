<?php

/*
 * Complete the 'bfs' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 *  3. 2D_INTEGER_ARRAY edges
 *  4. INTEGER s
 */

function bfs($n, $m, $edges, $s) {
    # Write your code here
    $graph = array_fill(1, $n, []);

    foreach ($edges as $edge) {
        $u = $edge[0];
        $v = $edge[1];
        $graph[$u][] = $v;
        $graph[$v][] = $u;
    }

    $distances = array_fill(1, $n, -1);
    $distances[$s] = 0;

    $queue = [$s];

    while (!empty($queue)) {
        $node = array_shift($queue);

        foreach ($graph[$node] as $neighbor) {
            if ($distances[$neighbor] == -1) {
                $distances[$neighbor] = $distances[$node] + 6;
                $queue[] = $neighbor;
            }
        }
    }

    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        if ($i != $s) {
            $result[] = $distances[$i];
        }
    }

    return $result;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);
    $m = intval($first_multiple_input[1]);

    $edges = array();

    for ($i = 0; $i < $m; $i++) {
        $edges_temp = rtrim(fgets(STDIN));

        $edges[] = array_map('intval', preg_split('/ /', $edges_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $s = intval(trim(fgets(STDIN)));

    $result = bfs($n, $m, $edges, $s);

    fwrite($fptr, implode(" ", $result) . "\n");
}

fclose($fptr);
