<?php

/*
 * Complete the 'timeInWords' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER h
 *  2. INTEGER m
 */

function timeInWords($h, $m) {
    # Write your code here
    $numbers = [
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen",
        20 => "twenty",
        21 => "twenty one",
        22 => "twenty two",
        23 => "twenty three",
        24 => "twenty four",
        25 => "twenty five",
        26 => "twenty six",
        27 => "twenty seven",
        28 => "twenty eight",
        29 => "twenty nine"
    ];

    if ($m == 0) {
        return $numbers[$h] . " o' clock";
    }
    elseif ($m == 15) {
        return "quarter past " . $numbers[$h];
    }
    elseif ($m == 30) {
        return "half past " . $numbers[$h];
    }
    elseif ($m == 45) {
        return "quarter to " . $numbers[($h % 12) + 1];
    }
    elseif ($m < 30) {
        $minuteWord = ($m == 1) ? "minute" : "minutes";
        return $numbers[$m] . " " . $minuteWord . " past " . $numbers[$h];
    }
    else {
        $minuteWord = ((60 - $m) == 1) ? "minute" : "minutes";
        return $numbers[60 - $m] . " " . $minuteWord . " to " . $numbers[($h % 12) + 1];
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$h = intval(trim(fgets(STDIN)));
$m = intval(trim(fgets(STDIN)));
$result = timeInWords($h, $m);

fwrite($fptr, $result . "\n");
fclose($fptr);
