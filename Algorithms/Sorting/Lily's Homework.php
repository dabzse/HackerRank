<?php

/*
 * Complete the 'lilysHomework' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function lilysHomework($arr) {
    # Write your code here
    function countSwaps($arr, $sortedArr) {
        $swaps = 0;
        $n = count($arr);
        $visited = array_fill(0, $n, False);
        $valueToIndex = array_flip($sortedArr);

        for ($i = 0; $i < $n; $i++) {
            if ($visited[$i] || $arr[$i] == $sortedArr[$i]) {
                continue;
            }

            $cycleSize = 0;
            $j = $i;

            while (!$visited[$j]) {
                $visited[$j] = True;
                $j = $valueToIndex[$arr[$j]];
                $cycleSize++;
            }

            if ($cycleSize > 1) {
                $swaps += $cycleSize - 1;
            }
        }

        return $swaps;
    }

    $ascendingArr = $arr;
    sort($ascendingArr);

    $descendingArr = $arr;
    rsort($descendingArr);

    return min(countSwaps($arr, $ascendingArr), countSwaps($arr, $descendingArr));
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lilysHomework($arr);

fwrite($fptr, $result . "\n");
fclose($fptr);
