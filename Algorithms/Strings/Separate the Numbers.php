<?php

/*
 * Complete the 'separateNumbers' function below.
 *
 * The function accepts STRING s as parameter.
 */

function separateNumbers($s) {
    # Write your code here
    $n = strlen($s);
    $isValid = "NO";

    for ($i = 1; $i <= $n / 2; $i++) {
        $firstNum = (int) substr($s, 0, $i);
        $current = $firstNum;
        $num = $firstNum;

        while (strlen($current) < $n) {
            $current .= ++$num;
        }

        if ($current === $s) {
            $isValid = "YES $firstNum";
            break;
        }
    }

    echo $isValid . PHP_EOL;
}

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    separateNumbers($s);
}
