<?php

/*
 * Complete the 'kangaroo' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER x1
 *  2. INTEGER v1
 *  3. INTEGER x2
 *  4. INTEGER v2
 */

function kangaroo($x1, $v1, $x2, $v2) {
    if ($v1 == $v2) {
        if ($x1 == $x2)
            return "YES";
        else
            return "NO";
    }

    if (($x1 - $x2) % ($v2 - $v1) == 0 && ($x1 - $x2) / ($v2 - $v1) > 0)
        return "YES";

    return "NO"; // Default case where they do not meet
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$x1 = intval($first_multiple_input[0]);
$v1 = intval($first_multiple_input[1]);

$x2 = intval($first_multiple_input[2]);
$v2 = intval($first_multiple_input[3]);

$result = kangaroo($x1, $v1, $x2, $v2);

fwrite($fptr, $result . "\n");
fclose($fptr);
