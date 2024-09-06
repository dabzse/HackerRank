<?php

/*
 * Complete the 'reverseShuffleMerge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function reverseShuffleMerge($s) {
    # Write your code here
    $char_count = array();
    $used_chars = array();
    $remaining_chars = array();
    $result = array();

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (isset($char_count[$char])) {
            $char_count[$char]++;
        }
        else {
            $char_count[$char] = 1;
        }
        $remaining_chars[$char] = $char_count[$char];
    }

    function can_use($char, $char_count, $used_chars) {
        return (!isset($used_chars[$char]) || $used_chars[$char] < $char_count[$char] / 2);
    }

    function can_pop($char, $remaining_chars, $used_chars, $char_count) {
        $needed_chars = $char_count[$char] / 2 - (isset($used_chars[$char]) ? $used_chars[$char] : 0);
        return ($remaining_chars[$char] > $needed_chars);
    }

    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $char = $s[$i];

        if (can_use($char, $char_count, $used_chars)) {
            while (!empty($result) && end($result) > $char && can_pop(end($result), $remaining_chars, $used_chars, $char_count)) {
                $removed_char = array_pop($result);
                $used_chars[$removed_char]--;
            }

            $result[] = $char;
            if (isset($used_chars[$char])) {
                $used_chars[$char]++;
            }
            else {
                $used_chars[$char] = 1;
            }
        }

        $remaining_chars[$char]--;
    }

    return implode('', $result);$char_count = array();
    $used_chars = array();
    $remaining_chars = array();
    $result = array();

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (isset($char_count[$char])) {
            $char_count[$char]++;
        }
        else {
            $char_count[$char] = 1;
        }
        $remaining_chars[$char] = $char_count[$char];
    }

    function can_use($char, $char_count, $used_chars) {
        return (!isset($used_chars[$char]) || $used_chars[$char] < $char_count[$char] / 2);
    }

    function can_pop($char, $remaining_chars, $used_chars, $char_count) {
        $needed_chars = $char_count[$char] / 2 - (isset($used_chars[$char]) ? $used_chars[$char] : 0);
        return ($remaining_chars[$char] > $needed_chars);
    }

    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $char = $s[$i];

        if (can_use($char, $char_count, $used_chars)) {
            while (!empty($result) && end($result) > $char && can_pop(end($result), $remaining_chars, $used_chars, $char_count)) {
                $removed_char = array_pop($result);
                $used_chars[$removed_char]--;
            }

            $result[] = $char;
            if (isset($used_chars[$char])) {
                $used_chars[$char]++;
            }
            else {
                $used_chars[$char] = 1;
            }
        }

        $remaining_chars[$char]--;
    }

    return implode('', $result);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = reverseShuffleMerge($s);

fwrite($fptr, $result. "\n");
fclose($fptr);
