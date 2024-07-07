<?php

/*
 * Complete the 'caesarCipher' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. INTEGER k
 */

function caesarCipher($s, $k) {
    # Write your code here
    $result = "";
    for ($i = 0; $i < strlen($s); $i++) {
        if (ctype_upper($s[$i])) {
            $result .= chr((ord($s[$i]) + $k - 65) % 26 + 65);
        }
        elseif (ctype_lower($s[$i])) {
            $result .= chr((ord($s[$i]) + $k - 97) % 26 + 97);
        }
        else {
            $result .= $s[$i];
        }
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$s = rtrim(fgets(STDIN), "\r\n");
$k = intval(trim(fgets(STDIN)));

$result = caesarCipher($s, $k);

fwrite($fptr, $result . "\n");
fclose($fptr);
