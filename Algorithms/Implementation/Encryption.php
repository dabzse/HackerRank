<?php

/*
 * Complete the 'encryption' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function encryption($s) {
    # Write your code here
    $s = str_replace(' ', '', $s);

    $len = strlen($s);
    $cols = ceil(sqrt($len));
    $rows = floor(sqrt($len));
    if ($rows * $cols < $len) {
        $rows += 1;
    }

    $arr = array_fill(0, $cols, "");

    for ($i = 0; $i < $len; $i++) {
        $arr[$i % $cols] .= $s[$i];
    }

    $result = implode(' ', $arr);

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = encryption($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
