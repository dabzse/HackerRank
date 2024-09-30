<?php

/*
 * Complete the 'gridlandMetro' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 *  3. INTEGER k
 *  4. 2D_INTEGER_ARRAY track
 */

function gridlandMetro($n, $m, $k, $track) {
    # Write your code here
    $track_map = [];

    foreach ($track as $t) {
        $row = $t[0];
        $start = $t[1];
        $end = $t[2];

        if (!isset($track_map[$row])) {
            $track_map[$row] = [];
        }

        $track_map[$row][] = [$start, $end];
    }

    $occupied_cells = 0;

    foreach ($track_map as $tracks) {
        usort($tracks, function($a, $b) {
            return $a[0] <=> $b[0];
        });

        $current_start = $tracks[0][0];
        $current_end = $tracks[0][1];

        for ($i = 1; $i < count($tracks); $i++) {
            $start = $tracks[$i][0];
            $end = $tracks[$i][1];

            if ($start <= $current_end) {
                $current_end = max($current_end, $end);
            }
            else {
                $occupied_cells += ($current_end - $current_start + 1);
                $current_start = $start;
                $current_end = $end;
            }
        }

        $occupied_cells += ($current_end - $current_start + 1);
    }

    $total_cells = $n * $m;

    return $total_cells - $occupied_cells;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$m = intval($first_multiple_input[1]);
$k = intval($first_multiple_input[2]);

$track = array();

for ($i = 0; $i < $k; $i++) {
    $track_temp = rtrim(fgets(STDIN));

    $track[] = array_map('intval', preg_split('/ /', $track_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = gridlandMetro($n, $m, $k, $track);

fwrite($fptr, $result . "\n");
fclose($fptr);
