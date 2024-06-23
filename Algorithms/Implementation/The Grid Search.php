<?php

/*
 * Complete the 'gridSearch' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING_ARRAY G
 *  2. STRING_ARRAY P
 */

function gridSearch($G, $P) {
    # Write your code here
    $rows_G = count($G);
    $cols_G = strlen($G[0]);
    $rows_P = count($P);
    $cols_P = strlen($P[0]);

    for ($i = 0; $i <= $rows_G - $rows_P; $i++) {
        for ($j = 0; $j <= $cols_G - $cols_P; $j++) {
            $match = true;
            for ($x = 0; $x < $rows_P; $x++) {
                if (substr($G[$i + $x], $j, $cols_P) !== $P[$x]) {
                    $match = false;
                    break;
                }
            }
            if ($match) {
                return "YES";
            }
        }
    }
    return "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $R = intval($first_multiple_input[0]);
    $C = intval($first_multiple_input[1]);

    $G = array();

    for ($i = 0; $i < $R; $i++) {
        $G_item = rtrim(fgets(STDIN), "\r\n");
        $G[] = $G_item;
    }

    $second_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $r = intval($second_multiple_input[0]);
    $c = intval($second_multiple_input[1]);

    $P = array();

    for ($i = 0; $i < $r; $i++) {
        $P_item = rtrim(fgets(STDIN), "\r\n");
        $P[] = $P_item;
    }

    $result = gridSearch($G, $P);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
