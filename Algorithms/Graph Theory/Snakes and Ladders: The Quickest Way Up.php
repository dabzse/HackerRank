<?php

/*
 * Complete the 'quickestWayUp' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. 2D_INTEGER_ARRAY ladders
 *  2. 2D_INTEGER_ARRAY snakes
 */

function quickestWayUp($ladders, $snakes) {
    # Write your code here
    $board = range(0, 100);

    foreach ($ladders as $ladder) {
        $start = $ladder[0];
        $end = $ladder[1];
        $board[$start] = $end;
    }
    foreach ($snakes as $snake) {
        $start = $snake[0];
        $end = $snake[1];
        $board[$start] = $end;
    }

    $queue = [[1, 0]];
    $visited = array_fill(0, 101, False);
    $visited[1] = True;
    $queueIndex = 0;

    while ($queueIndex < count($queue)) {
        [$current_square, $moves] = $queue[$queueIndex++];
        if ($current_square == 100) {
            return $moves;
        }

        for ($roll = 1; $roll <= 6; $roll++) {
            $next_square = $current_square + $roll;

            if ($next_square <= 100 && !$visited[$next_square]) {
                $visited[$next_square] = True;
                $queue[] = [$board[$next_square], $moves + 1];
            }
        }
    }

    return -1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $ladders = array();

    for ($i = 0; $i < $n; $i++) {
        $ladders_temp = rtrim(fgets(STDIN));

        $ladders[] = array_map('intval', preg_split('/ /', $ladders_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $m = intval(trim(fgets(STDIN)));

    $snakes = array();

    for ($i = 0; $i < $m; $i++) {
        $snakes_temp = rtrim(fgets(STDIN));

        $snakes[] = array_map('intval', preg_split('/ /', $snakes_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $result = quickestWayUp($ladders, $snakes);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
