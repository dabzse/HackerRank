<?php

# Complete the evenForest function below.
function evenForest($t_nodes, $t_edges, $t_from, $t_to) {
    $adj = array_fill(0, $t_nodes + 1, []);

    for ($i = 0; $i < $t_edges; $i++) {
        $adj[$t_from[$i]][] = $t_to[$i];
        $adj[$t_to[$i]][] = $t_from[$i];
    }

    $subtree_size = array_fill(0, $t_nodes + 1, 0);
    $visited = array_fill(0, $t_nodes + 1, False);

    function dfs($node, &$adj, &$visited, &$subtree_size) {
        $visited[$node] = True;
        $size = 1;

        foreach ($adj[$node] as $neighbor) {
            if (!$visited[$neighbor]) {
                $size += dfs($neighbor, $adj, $visited, $subtree_size);
            }
        }

        $subtree_size[$node] = $size;
        return $size;
    }

    dfs(1, $adj, $visited, $subtree_size);

    $cuttable_edges = 0;
    for ($i = 2; $i <= $t_nodes; $i++) {
        if ($subtree_size[$i] % 2 == 0) {
            $cuttable_edges++;
        }
    }

    return $cuttable_edges;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t_nodes_edges = explode(' ', rtrim(fgets(STDIN)));

$t_nodes = $t_nodes_edges[0];
$t_edges = $t_nodes_edges[1];

$t_from = array();
$t_to = array();

for ($i = 0; $i < $t_edges; $i++) {
    $t_from_to = explode(' ', rtrim(fgets(STDIN)));

    $t_from[] = $t_from_to[0];
    $t_to[] = $t_from_to[1];
}

$res = evenForest($t_nodes, $t_edges, $t_from, $t_to);

fwrite($fptr, $res . "\n");
fclose($fptr);
