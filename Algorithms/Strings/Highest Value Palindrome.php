<?php

/*
 * Complete the 'highestValuePalindrome' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. INTEGER n
 *  3. INTEGER k
 */

function highestValuePalindrome($s, $n, $k) {
    # Write your code here
    $min_no_of_changes = 0;
    for ($i = 0; $i < floor($n / 2); $i++) {
        if ($s[$i] != $s[$n - $i - 1]) {
            $min_no_of_changes += 1;
        }
    }

    if ($min_no_of_changes > $k) {
        return "-1";
    }

    $highest_value_palindrome = '';
    for ($i = 0; $i < floor($n / 2); $i++) {
        if ($k - $min_no_of_changes > 1) {
            if ($s[$i] != $s[$n - $i - 1]) {
                if ($s[$i] != "9" && $s[$n - $i - 1] != "9") {
                    $highest_value_palindrome .= "9";
                    $k -= 2;
                }
                else {
                    if ($s[$i] > $s[$n - $i - 1]) {
                        $highest_value_palindrome .= $s[$i];
                    }
                    else {
                        $highest_value_palindrome .= $s[$n - $i - 1];
                    }
                    $k -= 1;
                }
                $min_no_of_changes -= 1;
            }
            elseif ($s[$i] != "9") {
                $highest_value_palindrome .= "9";
                $k -= 2;
            }
            else {
                $highest_value_palindrome .= $s[$i];
            }
        }
        elseif ($k - $min_no_of_changes == 1) {
            if ($s[$i] != $s[$n - $i - 1]) {
                if ($s[$i] != "9" && $s[$n - $i - 1] != "9") {
                    $highest_value_palindrome .= "9";
                    $k -= 2;
                }
                else {
                    if ($s[$i] > $s[$n - $i - 1]) {
                        $highest_value_palindrome .= $s[$i];
                    }
                    else {
                        $highest_value_palindrome .= $s[$n - $i - 1];
                    }
                    $k -= 1;
                }
                $min_no_of_changes -= 1;
            }
            else {
                $highest_value_palindrome .= $s[$i];
            }
        }
        elseif ($s[$i] != $s[$n - $i - 1]) {
            if ($s[$i] > $s[$n - $i - 1]) {
                $highest_value_palindrome .= $s[$i];
            }
            else {
                $highest_value_palindrome .= $s[$n - $i - 1];
            }
            $k -= 1;
            $min_no_of_changes -= 1;
        }
        else {
            $highest_value_palindrome .= $s[$i];
        }
    }

    if ($n % 2 == 1) {
        if ($k > 0) {
            return $highest_value_palindrome . "9" . strrev($highest_value_palindrome);
        }
        return $highest_value_palindrome . $s[floor($n / 2)] . strrev($highest_value_palindrome);
    }

    return $highest_value_palindrome . strrev($highest_value_palindrome);

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);
$s = rtrim(fgets(STDIN), "\r\n");

$result = highestValuePalindrome($s, $n, $k);

fwrite($fptr, $result . "\n");
fclose($fptr);
