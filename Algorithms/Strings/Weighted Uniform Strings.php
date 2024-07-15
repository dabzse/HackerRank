<?php

/*
 * Complete the 'weightedUniformStrings' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. INTEGER_ARRAY queries
 */

function weightedUniformStrings($s, $queries) {
    # Write your code here
    $weights = [];
    $weight = 0;
    $prevChar = '';

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        $charWeight = ord($char) - ord('a') + 1;

        if ($char != $prevChar) {
            $weight = $charWeight;
        }
        else {
            $weight += $charWeight;
        }

        $weights[$weight] = True;
        $prevChar = $char;
    }

    $results = [];
    foreach ($queries as $query) {
        $results[] = isset($weights[$query]) ? 'Yes' : 'No';
    }

    return $results;
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$queries_count = intval(trim(fgets(STDIN)));
$queries = array();

for ($i = 0; $i < $queries_count; $i++) {
    $queries_item = intval(trim(fgets(STDIN)));
    $queries[] = $queries_item;
}

$result = weightedUniformStrings($s, $queries);

fwrite($fptr, implode("\n", $result) . "\n");
fclose($fptr);
