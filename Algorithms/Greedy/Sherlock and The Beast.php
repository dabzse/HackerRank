<?php

/*
 * Complete the 'decentNumber' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function decentNumber($n) {
    # Write your code here
    $numberOfFives = $n - ($n % 3);

    while ($numberOfFives >= 0) {
        if (($n - $numberOfFives) % 5 == 0) {

            echo str_repeat('5', $numberOfFives) . str_repeat('3', $n - $numberOfFives) . "\n";
            return;
        }

        $numberOfFives -= 3;
    }

    echo "-1\n";
}

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));
    decentNumber($n);
}
