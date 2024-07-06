<?php

/*
 * Complete the 'alternate' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function alternate($s) {
    # Write your code here
    $max_length = 0;

    $unique_chars = array_unique(str_split($s));

    foreach($unique_chars as $char1) {
        foreach($unique_chars as $char2) {
            if($char1 != $char2) {
                $filtered_str = preg_replace("/[^$char1$char2]/", "", $s);
                if(ctype_alternate($filtered_str)) {
                    $max_length = max($max_length, strlen($filtered_str));
                }
            }
        }
    }

    return $max_length;
}

function ctype_alternate($s) {
    for($i = 0; $i < strlen($s) - 1; $i++) {
        if($s[$i] == $s[$i + 1]) {
            return False;
        }
    }
    return True;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$l = intval(trim(fgets(STDIN)));
$s = rtrim(fgets(STDIN), "\r\n");

$result = alternate($s);

fwrite($fptr, $result . "\n");
fclose($fptr);
