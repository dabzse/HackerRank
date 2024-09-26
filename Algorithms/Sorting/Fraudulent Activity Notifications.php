<?php

/*
 * Complete the 'activityNotifications' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY expenditure
 *  2. INTEGER d
 */

function activityNotifications($expenditure, $d) {
    # Write your code here
    $notifications = 0;
    $counts = array_fill(0, 201, 0);

    for ($i = 0; $i < $d; $i++) {
        $counts[$expenditure[$i]]++;
    }

    function findMedian($counts, $d) {
        $count = 0;
        $median1 = Null;
        $median2 = Null;

        if ($d % 2 == 1) {
            $median_pos1 = intdiv($d, 2) + 1;
        } else {
            $median_pos1 = intdiv($d, 2);
            $median_pos2 = $median_pos1 + 1;
        }

        for ($i = 0; $i < 201; $i++) {
            $count += $counts[$i];

            if ($median1 === Null && $count >= $median_pos1) {
                $median1 = $i;
            }
            if ($median2 === Null && isset($median_pos2) && $count >= $median_pos2) {
                $median2 = $i;
            }

            if ($median1 !== Null && ($median2 !== Null || $d % 2 == 1)) {
                break;
            }
        }

        if ($d % 2 == 1) {
            return $median1;
        }
        else {
            return ($median1 + $median2) / 2;
        }
    }

    for ($i = $d; $i < count($expenditure); $i++) {
        $median = findMedian($counts, $d);

        if ($expenditure[$i] >= 2 * $median) {
            $notifications++;
        }

        $counts[$expenditure[$i]]++;
        $counts[$expenditure[$i - $d]]--;
    }

    return $notifications;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$d = intval($first_multiple_input[1]);

$expenditure_temp = rtrim(fgets(STDIN));

$expenditure = array_map('intval', preg_split('/ /', $expenditure_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = activityNotifications($expenditure, $d);

fwrite($fptr, $result . "\n");
fclose($fptr);
