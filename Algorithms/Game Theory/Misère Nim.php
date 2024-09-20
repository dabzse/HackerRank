<?php

/*
 * Complete the 'misereNim' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY s as parameter.
 */

function misereNim($s) {
    # Write your code here
    $nim_sum = 0;
    foreach($s as $pile){
        $nim_sum ^= $pile;
    }

    if (array_reduce($s, function($carry, $pile) { return $carry && $pile == 1; }, True))
        return (count($s) % 2 == 0) ? "First" : "Second";

    return ($nim_sum == 0) ? "Second" : "First";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $s_temp = rtrim(fgets(STDIN));

    $s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = misereNim($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
