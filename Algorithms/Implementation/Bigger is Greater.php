<?php

/*
 * Complete the 'biggerIsGreater' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING w as parameter.
 */

function biggerIsGreater($w) {
    # Write your code here
    $chars = str_split($w);
    $n = count($chars);

    $i = $n - 2;
    while ($i >= 0 && $chars[$i] >= $chars[$i + 1]) {
        $i--;
    }

    if ($i == -1) {
        return "no answer";
    }

    $j = $n - 1;
    while ($chars[$j] <= $chars[$i]) {
        $j--;
    }

    list($chars[$i], $chars[$j]) = array($chars[$j], $chars[$i]);

    $left = $i + 1;
    $right = $n - 1;
    while ($left < $right) {
        list($chars[$left], $chars[$right]) = array($chars[$right], $chars[$left]);
        $left++;
        $right--;
    }

    return implode('', $chars);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$T = intval(trim(fgets(STDIN)));

for ($T_itr = 0; $T_itr < $T; $T_itr++) {
    $w = rtrim(fgets(STDIN), "\r\n");

    $result = biggerIsGreater($w);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
