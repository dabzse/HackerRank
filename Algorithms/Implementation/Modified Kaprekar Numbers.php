<?php

/*
 * Complete the 'kaprekarNumbers' function below.
 *
 * The function accepts following parameters:
 *  1. INTEGER p
 *  2. INTEGER q
 */

function kaprekarNumbers($p, $q) {
    # Write your code here
    $kaprekar_nums = [];
    for ($i = $p; $i <= $q; $i++) {
        if (!is_int($i)) {
            continue;
        }
        $sq = $i * $i;
        $left = (int) (substr($sq, 0, (strlen($sq) / 2)));
        $right = (int) (substr($sq, (strlen($sq) / 2)));
        if ($left + $right == $i) {
            $kaprekar_nums[] = $i;
        }
    }
    if ($kaprekar_nums) {
        echo implode(' ', $kaprekar_nums);
    }
    else {
        echo "INVALID RANGE";
    }
}

$p = intval(trim(fgets(STDIN)));
$q = intval(trim(fgets(STDIN)));

kaprekarNumbers($p, $q);