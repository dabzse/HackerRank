<?php

/*
 * Complete the 'climbingLeaderboard' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY ranked
 *  2. INTEGER_ARRAY player
 */

function climbingLeaderboard($ranked, $player) {
    # Write your code here

    $result = [];
    $ranked = array_unique($ranked);
    rsort($ranked);

    foreach ($player as $score) {
        while (count($ranked) > 0 && $ranked[count($ranked) - 1] <= $score) {
            array_pop($ranked);
        }
        $result[] = count($ranked) + 1;
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$ranked_count = intval(trim(fgets(STDIN)));
$ranked_temp = rtrim(fgets(STDIN));
$ranked = array_map('intval', preg_split('/ /', $ranked_temp, -1, PREG_SPLIT_NO_EMPTY));

$player_count = intval(trim(fgets(STDIN)));
$player_temp = rtrim(fgets(STDIN));
$player = array_map('intval', preg_split('/ /', $player_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = climbingLeaderboard($ranked, $player);

fwrite($fptr, implode("\n", $result) . "\n");
fclose($fptr);
