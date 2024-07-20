<?php

/*
 * Complete the 'anagram' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function anagram($s) {
    # Write your code here
    $length = strlen($s);

    if ($length % 2 != 0) {
        return -1;
    }

    $firstHalf = substr($s, 0, $length / 2);
    $secondHalf = substr($s, $length / 2);

    $firstFreq = array_count_values(str_split($firstHalf));
    $secondFreq = array_count_values(str_split($secondHalf));


    $changes = 0;
    foreach ($firstFreq as $char => $count) {
        if (isset($secondFreq[$char])) {
            $changes += max(0, $count - $secondFreq[$char]);
        }
        else {
            $changes += $count;
        }
    }
    return $changes;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = anagram($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
