<?php

/*
 * Complete the 'isValid' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function isValid($s) {
    # Write your code here
    $char_count = [];
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (array_key_exists($char, $char_count)) {
            $char_count[$char]++;
        }
        else {
            $char_count[$char] = 1;
        }
    }

    $freq_count = [];
    foreach ($char_count as $count) {
        if (array_key_exists($count, $freq_count)) {
            $freq_count[$count]++;
        }
        else {
            $freq_count[$count] = 1;
        }
    }

    if (count($freq_count) == 1) {
        return "YES";
    }
    elseif (count($freq_count) == 2) {
        $freq_keys = array_keys($freq_count);
        if (in_array(1, $freq_keys) && $freq_count[1] == 1) {
            return "YES";
        }
        elseif (abs($freq_keys[0] - $freq_keys[1]) == 1 && ($freq_count[$freq_keys[0]] == 1 || $freq_count[$freq_keys[1]] == 1)) {
            return "YES";
        }
    }
    return "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = isValid($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
