<?php

/*
 * Complete the 'steadyGene' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING gene as parameter.
 */

function steadyGene($gene) {
    # Write your code here
    $n = strlen($gene);
    $ideal_count = $n / 4;
    $count = array_count_values(str_split($gene));

    foreach (['A', 'C', 'G', 'T'] as $char) {
        if (!isset($count[$char])) {
            $count[$char] = 0;
        }
    }

    $excess = array('A' => 0, 'C' => 0, 'G' => 0, 'T' => 0);
    foreach ($count as $char => $c) {
        if ($c > $ideal_count) {
            $excess[$char] = $c - $ideal_count;
        }
    }

    if (array_sum($excess) == 0) {
        return 0;
    }

    $min_length = $n;
    $left = 0;

    for ($right = 0; $right < $n; $right++) {
        $count[$gene[$right]]--;

        while (allBelowOrEqual($count, $ideal_count)) {
            $min_length = min($min_length, $right - $left + 1);
            $count[$gene[$left]]++;
            $left++;
        }
    }

    return $min_length;
}

function allBelowOrEqual($count, $limit) {
    foreach (['A', 'C', 'G', 'T'] as $char) {
        if ($count[$char] > $limit) {
            return False;
        }
    }
    return True;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$gene = rtrim(fgets(STDIN), "\r\n");

$result = steadyGene($gene);

fwrite($fptr, $result . "\n");
fclose($fptr);
