<?php

/*
 * Complete the 'cutTheTree' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY data
 *  2. 2D_INTEGER_ARRAY edges
 */

function cutTheTree($data, $edges) {
    # Write your code here
    $n = count($data);

    $tree = array_fill(0, $n, []);
    foreach ($edges as $edge) {
        $u = $edge[0] - 1;
        $v = $edge[1] - 1;
        $tree[$u][] = $v;
        $tree[$v][] = $u;
    }

    $totalSum = array_sum($data);

    $visited = array_fill(0, $n, False);
    $subtreeSum = array_fill(0, $n, 0);

        function dfs($node, &$tree, &$data, &$visited, &$subtreeSum) {
        $visited[$node] = true;
        $currentSum = $data[$node];

        foreach ($tree[$node] as $neighbor) {
            if (!$visited[$neighbor]) {
                $currentSum += dfs($neighbor, $tree, $data, $visited, $subtreeSum);
            }
        }

        $subtreeSum[$node] = $currentSum;
        return $currentSum;
    }

    dfs(0, $tree, $data, $visited, $subtreeSum);

    $minDifference = PHP_INT_MAX;
    for ($i = 1; $i < $n; $i++) {
        $partSum = $subtreeSum[$i];
        $remainingSum = $totalSum - $partSum;
        $minDifference = min($minDifference, abs($partSum - $remainingSum));
    }

    return $minDifference;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$data_temp = rtrim(fgets(STDIN));

$data = array_map('intval', preg_split('/ /', $data_temp, -1, PREG_SPLIT_NO_EMPTY));

$edges = array();

for ($i = 0; $i < ($n - 1); $i++) {
    $edges_temp = rtrim(fgets(STDIN));

    $edges[] = array_map('intval', preg_split('/ /', $edges_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = cutTheTree($data, $edges);

fwrite($fptr, $result . "\n");
fclose($fptr);
