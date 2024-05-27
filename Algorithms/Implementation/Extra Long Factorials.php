<?php

/*
 * Complete the 'extraLongFactorials' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function extraLongFactorials($n) {
    # Write your code here
    $factorial = '1';

    for ($i = 1; $i <= $n; $i++) {
        $factorial = multiply($factorial, (string)$i);
    }
    echo $factorial . "\n";
}

function multiply($a, $b) {
    $a = strrev($a);
    $b = strrev($b);
    $result = array_fill(0, strlen($a) + strlen($b), 0);

    for ($i = 0; $i < strlen($a); $i++) {
        for ($j = 0; $j < strlen($b); $j++) {
            $result[$i + $j] += (int)$a[$i] * (int)$b[$j];
            if ($result[$i + $j] >= 10) {
                $result[$i + $j + 1] += (int)($result[$i + $j] / 10);
                $result[$i + $j] %= 10;
            }
        }
    }

    while (end($result) == 0) {
        array_pop($result);
    }

    return strrev(implode('', $result));
}

$n = intval(trim(fgets(STDIN)));

extraLongFactorials($n);
