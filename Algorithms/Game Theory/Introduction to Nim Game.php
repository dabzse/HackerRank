<?php

/*
 * Complete the 'nimGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY pile as parameter.
 */

function nimGame($pile) {
    # Write your code here
    $xor = 0;
    foreach($pile as $p){
        $xor ^= $p;
    }
    return $xor == 0 ? "Second" : "First";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g = intval(trim(fgets(STDIN)));

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $pile_temp = rtrim(fgets(STDIN));

    $pile = array_map('intval', preg_split('/ /', $pile_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = nimGame($pile);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
