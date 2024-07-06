<?php

/*
 * Complete the 'superReducedString' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function superReducedString($s) {
    # Write your code here
    $stack = [];

    foreach (str_split($s) as $char) {
        if (!empty($stack) && end($stack) == $char) {
            array_pop($stack);
        }
        else {
            array_push($stack, $char);
        }
    }

    $reducedString = implode('', $stack);

    return $reducedString === '' ? 'Empty String' : $reducedString;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");
$result = superReducedString($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
