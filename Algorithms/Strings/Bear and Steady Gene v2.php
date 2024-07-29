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

    $excess = [];
    foreach (['A', 'C', 'G', 'T'] as $char) {
        $excess[$char] = max(0, $count[$char] - $ideal_count);
    }

    if (array_sum($excess) == 0) {
        return 0;
    }

    $min_length = $n;
    $left = 0;
    $current_count = $count;

    for ($right = 0; $right < $n; $right++) {
        $current_count[$gene[$right]] -= 1;

        foreach (['A', 'C', 'G', 'T'] as $char) {
            if (!isset($current_count[$char])) {
                $current_count[$char] = 0;
            }
        }

        while ($left < $n && array_reduce(array_keys($excess), function($carry, $char) use ($current_count, $ideal_count) {
            return $carry && ($current_count[$char] <= $ideal_count);
        }, True)) {
            $min_length = min($min_length, $right - $left + 1);
            $current_count[$gene[$left]] += 1;
            $left++;
        }
    }

    return $min_length;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$gene = rtrim(fgets(STDIN), "\r\n");

$result = steadyGene($gene);

fwrite($fptr, $result . "\n");
fclose($fptr);
