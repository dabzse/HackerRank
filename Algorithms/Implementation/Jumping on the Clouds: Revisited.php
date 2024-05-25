<?php

# Complete the jumpingOnClouds function below.
function jumpingOnClouds($c, $k) {
    $n = count($c);
    $energy = 100;
    $i = 0;
    while (true) {
        $energy -= 1;
        $i = ($i + $k) % $n;
        if ($c[$i] == 1) {
            $energy -= 2;
        }
        if ($i == 0) {
            break;
        }
    }

    return $energy;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);
$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
