<?php

/*
 * Complete the 'gradingStudents' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY grades as parameter.
 */

function gradingStudents($grades) {
    # Write your code here
    $result = [];
    foreach($grades as $grade) {
        if($grade < 38)
            $result[] = $grade;
        else {
            $nextMultipleOfFive = (5 - $grade % 5);
            $result[] = ($nextMultipleOfFive < 3) ? $grade + $nextMultipleOfFive : $grade;
        }
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$grades_count = intval(trim(fgets(STDIN)));
$grades = array();

for ($i = 0; $i < $grades_count; $i++) {
    $grades_item = intval(trim(fgets(STDIN)));
    $grades[] = $grades_item;
}

$result = gradingStudents($grades);
fwrite($fptr, implode("\n", $result) . "\n");
fclose($fptr);
