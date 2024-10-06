<?php

/*
 * Complete the 'kruskals' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts WEIGHTED_INTEGER_GRAPH g as parameter.
 */

/*
 * For the weighted graph, <name>:
 *
 * 1. The number of nodes is <name>_nodes.
 * 2. The number of edges is <name>_edges.
 * 3. An edge exists between <name>_from[i] and <name>_to[i]. The weight of the edge is <name>_weight[i].
 *
 */

class UnionFind {
    private $parent;
    private $rank;

    public function __construct($n) {
        $this->parent = range(0, $n - 1);
        $this->rank = array_fill(0, $n, 0);
    }

    public function find($u) {
        if ($this->parent[$u] != $u) {
            $this->parent[$u] = $this->find($this->parent[$u]);
        }
        return $this->parent[$u];
    }
    public function union($u, $v) {
        $root_u = $this->find($u);
        $root_v = $this->find($v);

        if ($root_u != $root_v) {

            if ($this->rank[$root_u] > $this->rank[$root_v]) {
                $this->parent[$root_v] = $root_u;
            }
            elseif ($this->rank[$root_u] < $this->rank[$root_v]) {
                $this->parent[$root_u] = $root_v;
            }
            else {
                $this->parent[$root_v] = $root_u;
                $this->rank[$root_u]++;
            }
        }
    }
}

function kruskals($g_nodes, $g_from, $g_to, $g_weight) {
    $edges = [];

    for ($i = 0; $i < count($g_from); $i++) {
        $edges[] = [$g_weight[$i], $g_from[$i] - 1, $g_to[$i] - 1];
    }

    usort($edges, function ($a, $b) {
        return $a[0] - $b[0];
    });

    $uf = new UnionFind($g_nodes);
    $mst_weight = 0;
    $mst_edges = 0;

    foreach ($edges as $edge) {
        list($weight, $u, $v) = $edge;
        if ($uf->find($u) != $uf->find($v)) {
            $uf->union($u, $v);
            $mst_weight += $weight;
            $mst_edges++;
            if ($mst_edges == $g_nodes - 1) {
                break;
            }
        }
    }

    return $mst_weight;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g_nodes_edges = explode(' ', rtrim(fgets(STDIN)));

$g_nodes = $g_nodes_edges[0];
$g_edges = $g_nodes_edges[1];

$g_from = array();
$g_to = array();
$g_weight = array();

for ($i = 0; $i < $g_edges; $i++) {
    $g_from_to_weight = explode(' ', rtrim(fgets(STDIN)));

    $g_from[] = $g_from_to_weight[0];
    $g_to[] = $g_from_to_weight[1];
    $g_weight[] = $g_from_to_weight[2];
}

$res = kruskals($g_nodes, $g_from, $g_to, $g_weight);

# Write your code here.
fwrite($fptr, $res . PHP_EOL);
fclose($fptr);
