<?php

/*
 * Complete the 'happyLadybugs' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING b as parameter.
 */

function happyLadybugs($b) {
    # Write your code here
    $freq = array_count_values(str_split($b));

    foreach ($freq as $char => $count) {
        if ($char != '_' && $count == 1) {
            return "NO";
        }
    }

    if (isset($freq['_'])) {
        return "YES";
    }

    for ($i = 1; $i < strlen($b) - 1; $i++) {
        if ($b[$i] != $b[$i - 1] && $b[$i] != $b[$i + 1]) {
            return "NO";
        }
    }

    return "YES";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g = intval(trim(fgets(STDIN)));

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $b = rtrim(fgets(STDIN), "\r\n");

    $result = happyLadybugs($b);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
