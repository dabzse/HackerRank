<?php

/*
 * Complete the 'marsExploration' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function marsExploration($s) {
    # Write your code here
    $count = 0;
    for ($i = 0; $i < strlen($s); $i+=3) {
        if ($s[$i] != 'S') $count += 1;
        if ($s[$i+1] != 'O') $count += 1;
        if ($s[$i+2] != 'S') $count += 1;
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");
$result = marsExploration($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
