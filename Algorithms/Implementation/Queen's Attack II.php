<?php

/*
 * Complete the 'queensAttack' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER k
 *  3. INTEGER r_q
 *  4. INTEGER c_q
 *  5. 2D_INTEGER_ARRAY obstacles
 */

function queensAttack($n, $k, $r_q, $c_q, $obstacles) {
    # Write your code here
    $directions = [
        'N' => $n - $r_q,
        'S' => $r_q - 1,
        'E' => $n - $c_q,
        'W' => $c_q - 1,
        'NE' => min($n - $r_q, $n - $c_q),
        'NW' => min($n - $r_q, $c_q - 1),
        'SE' => min($r_q - 1, $n - $c_q),
        'SW' => min($r_q - 1, $c_q - 1),
    ];

    foreach ($obstacles as $obstacle) {
        $r_o = $obstacle[0];
        $c_o = $obstacle[1];

        if ($c_o == $c_q && $r_o > $r_q) {
            $directions['N'] = min($directions['N'], $r_o - $r_q - 1);
        }

        if ($c_o == $c_q && $r_o < $r_q) {
            $directions['S'] = min($directions['S'], $r_q - $r_o - 1);
        }

        if ($r_o == $r_q && $c_o > $c_q) {
            $directions['E'] = min($directions['E'], $c_o - $c_q - 1);
        }

        if ($r_o == $r_q && $c_o < $c_q) {
            $directions['W'] = min($directions['W'], $c_q - $c_o - 1);
        }

        if ($r_o > $r_q && $c_o > $c_q && ($r_o - $r_q) == ($c_o - $c_q)) {
            $directions['NE'] = min($directions['NE'], $r_o - $r_q - 1);
        }

        if ($r_o > $r_q && $c_o < $c_q && ($r_o - $r_q) == ($c_q - $c_o)) {
            $directions['NW'] = min($directions['NW'], $r_o - $r_q - 1);
        }

        if ($r_o < $r_q && $c_o > $c_q && ($r_q - $r_o) == ($c_o - $c_q)) {
            $directions['SE'] = min($directions['SE'], $r_q - $r_o - 1);
        }

        if ($r_o < $r_q && $c_o < $c_q && ($r_q - $r_o) == ($c_q - $c_o)) {
            $directions['SW'] = min($directions['SW'], $r_q - $r_o - 1);
        }
    }

    $totalMoves = array_sum($directions);

    return $totalMoves;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);

$second_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$r_q = intval($second_multiple_input[0]);
$c_q = intval($second_multiple_input[1]);

$obstacles = array();

for ($i = 0; $i < $k; $i++) {
    $obstacles_temp = rtrim(fgets(STDIN));

    $obstacles[] = array_map('intval', preg_split('/ /', $obstacles_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = queensAttack($n, $k, $r_q, $c_q, $obstacles);

fwrite($fptr, $result . "\n");
fclose($fptr);
