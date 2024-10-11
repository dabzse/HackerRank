<?php

/*
 * Complete the 'journeyToMoon' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. 2D_INTEGER_ARRAY astronaut
 */

function journeyToMoon($n, $astronaut) {
    # Write your code here
    $graph = array_fill(0, $n, []);

    // Build the graph from the astronaut pairs
    foreach ($astronaut as $pair) {
        $graph[$pair[0]][] = $pair[1];
        $graph[$pair[1]][] = $pair[0];
    }

    function dfs($node, &$visited, &$graph) {
        $stack = [$node];
        $visited[$node] = True;
        $size = 0;

        while (!empty($stack)) {
            $current = array_pop($stack);
            $size++;

            foreach ($graph[$current] as $neighbor) {
                if (!$visited[$neighbor]) {
                    $visited[$neighbor] = True;
                    $stack[] = $neighbor;
                }
            }
        }

        return $size;
    }

    $visited = array_fill(0, $n, False);
    $component_sizes = [];

    for ($i = 0; $i < $n; $i++) {
        if (!$visited[$i]) {
            $component_size = dfs($i, $visited, $graph);
            $component_sizes[] = $component_size;
        }
    }

    $total_pairs = ($n * ($n - 1)) / 2;
    $same_country_pairs = 0;

    foreach ($component_sizes as $size) {
        $same_country_pairs += ($size * ($size - 1)) / 2;
    }

    return $total_pairs - $same_country_pairs;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$p = intval($first_multiple_input[1]);

$astronaut = array();

for ($i = 0; $i < $p; $i++) {
    $astronaut_temp = rtrim(fgets(STDIN));

    $astronaut[] = array_map('intval', preg_split('/ /', $astronaut_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = journeyToMoon($n, $astronaut);

fwrite($fptr, $result . "\n");
fclose($fptr);
