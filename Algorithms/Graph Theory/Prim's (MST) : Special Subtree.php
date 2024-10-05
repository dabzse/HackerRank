<?php

/*
 * Complete the 'prims' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. 2D_INTEGER_ARRAY edges
 *  3. INTEGER start
 */

function prims($n, $edges, $start) {
    # Write your code here
    $adj = [];
    for ($i = 1; $i <= $n; $i++) {
        $adj[$i] = [];
    }

    foreach ($edges as $edge) {
        list($u, $v, $w) = $edge;
        $adj[$u][] = [$w, $v];
        $adj[$v][] = [$w, $u];
    }

    $pq = new SplPriorityQueue();

    $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

    $pq->insert($start, 0);

    $visited = array_fill(1, $n, False);
    $mst_weight = 0;

    while (!$pq->isEmpty()) {
        $curr = $pq->extract();
        $weight = -$curr['priority'];
        $node = $curr['data'];

        if ($visited[$node]) {
            continue;
        }

        $mst_weight += $weight;
        $visited[$node] = True;

        foreach ($adj[$node] as $neighbor) {
            list($next_weight, $next_node) = $neighbor;
            if (!$visited[$next_node]) {
                $pq->insert($next_node, -$next_weight);
            }
        }
    }

    return $mst_weight;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$m = intval($first_multiple_input[1]);

$edges = array();

for ($i = 0; $i < $m; $i++) {
    $edges_temp = rtrim(fgets(STDIN));

    $edges[] = array_map('intval', preg_split('/ /', $edges_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$start = intval(trim(fgets(STDIN)));
$result = prims($n, $edges, $start);

fwrite($fptr, $result . "\n");
fclose($fptr);
