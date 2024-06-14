<?php

/*
 * Complete the 'howManyGames' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER p
 *  2. INTEGER d
 *  3. INTEGER m
 *  4. INTEGER s
 */

function howManyGames($p, $d, $m, $s) {
    # Return the number of games you can buy
    $games = 0;
    while ($s >= 0) {
        if ($p > $s) {
            break;
        }
        $s -= $p;
        $games++;
        $p = max($p - $d, $m);
    }
    return $games;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$p = intval($first_multiple_input[0]);
$d = intval($first_multiple_input[1]);
$m = intval($first_multiple_input[2]);
$s = intval($first_multiple_input[3]);
$answer = howManyGames($p, $d, $m, $s);

fwrite($fptr, $answer . "\n");
fclose($fptr);
