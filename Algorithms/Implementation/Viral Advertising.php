<?php

/*
 * Complete the 'viralAdvertising' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function viralAdvertising($n) {
    # Write your code here
    $shared = 5;
    $cumulative = 0;
    for ($i = 0; $i < $n; $i++) {
        $liked = intval($shared / 2);
        $cumulative += $liked;
        $shared = $liked * 3;
    }
    return $cumulative;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$result = viralAdvertising($n);

fwrite($fptr, $result . "\n");
fclose($fptr);
