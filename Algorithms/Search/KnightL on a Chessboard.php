<?php

/*
 * Complete the 'knightlOnAChessboard' function below.
 *
 * The function is expected to return a 2D_INTEGER_ARRAY.
 * The function accepts INTEGER n as parameter.
 */

function knightlOnAChessboard($n) {
    # Write your code here
    $result = [];

    for ($i = 1; $i < $n; $i++) {
        $row = [];
        for ($j = 1; $j < $n; $j++) {
            $moves = bfs($n, $i, $j);
            $row[] = $moves;
        }
        $result[] = $row;
    }

    return $result;
}

function bfs($n, $a, $b) {
    $queue = [[0, 0, 0]];
    $visited = array_fill(0, $n, array_fill(0, $n, False));

    while (!empty($queue)) {
        [$x, $y, $moves] = array_shift($queue);

        if ($x == $n - 1 && $y == $n - 1) {
            return $moves;
        }

        $moves++;

        $nextMoves = [
            [$x + $a, $y + $b],
            [$x + $a, $y - $b],
            [$x - $a, $y + $b],
            [$x - $a, $y - $b],
            [$x + $b, $y + $a],
            [$x + $b, $y - $a],
            [$x - $b, $y + $a],
            [$x - $b, $y - $a],
        ];

        foreach ($nextMoves as $next) {
            [$nextX, $nextY] = $next;
            if ($nextX >= 0 && $nextX < $n && $nextY >= 0 && $nextY < $n && !$visited[$nextX][$nextY]) {
                $visited[$nextX][$nextY] = True;
                $queue[] = [$nextX, $nextY, $moves];
            }
        }
    }

    return -1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$result = knightlOnAChessboard($n);

fwrite($fptr, implode("\n", array_map(function($arr) { return implode(' ', $arr); }, $result)) . "\n");

fclose($fptr);
