<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path) {
    $seaLevel = 0;
    $valleyCount = 0;
    $isInValley = false;

    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == 'U') {
            $seaLevel++;

            if ($seaLevel == 0 && $isInValley) {
                $isInValley = false;
            }
        }
        else {
            $seaLevel--;

            if ($seaLevel == -1 && !$isInValley) {
                $valleyCount++;
                $isInValley = true;
            }
        }
    }
    return $valleyCount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));
$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");
fclose($fptr);
