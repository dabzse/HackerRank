<?php

# Complete the getMinimumCost function below.
function getMinimumCost($k, $c) {
    sort($c);
    $cost = 0;
    for ($i = 0; $i < count($c); $i++) {
        $cost += (floor($i / $k) + 1) * $c[count($c) - 1 - $i];
    }
    return $cost;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);
$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$minimumCost = getMinimumCost($k, $c);

fwrite($fptr, $minimumCost . "\n");

fclose($stdin);
fclose($fptr);

