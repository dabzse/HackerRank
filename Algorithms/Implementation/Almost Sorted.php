<?php

/*
 * Complete the 'almostSorted' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function almostSorted($arr) {
    # Write your code here
    $n = count($arr);
    $sortedArr = $arr;
    sort($sortedArr);

    if ($arr === $sortedArr) {
        echo "yes\n";
        return;
    }

    $l = 0;
    $r = $n - 1;

    while ($l < $n && $arr[$l] === $sortedArr[$l]) {
        $l++;
    }
    while ($r >= 0 && $arr[$r] === $sortedArr[$r]) {
        $r--;
    }

    list($arr[$l], $arr[$r]) = array($arr[$r], $arr[$l]);

    if ($arr === $sortedArr) {
        echo "yes\n";
        echo "swap " . ($l + 1) . " " . ($r + 1) . "\n";
        return;
    }

    list($arr[$l], $arr[$r]) = array($arr[$r], $arr[$l]);

    $subArray = array_slice($arr, $l, $r - $l + 1);
    $reversedSubArray = array_reverse($subArray);

    if (array_merge(array_slice($arr, 0, $l), $reversedSubArray, array_slice($arr, $r + 1)) === $sortedArr) {
        echo "yes\n";
        echo "reverse " . ($l + 1) . " " . ($r + 1) . "\n";
        return;
    }

    echo "no\n";
}

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

almostSorted($arr);
