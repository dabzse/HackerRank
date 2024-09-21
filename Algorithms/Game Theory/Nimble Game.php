<?php

/*
 * Complete the 'nimbleGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY s as parameter.
 */

function nimbleGame($s) {
    # Write your code here
    $xor_sum = 0;
    foreach ($s as $i => $coins) {
        if ($coins % 2 != 0) {
            $xor_sum ^= $i;
        }
    }

    return ($xor_sum == 0) ? "Second" : "First";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $s_temp = rtrim(fgets(STDIN));

    $s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = nimbleGame($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
