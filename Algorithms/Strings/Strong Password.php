<?php

/*
 * Complete the 'minimumNumber' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. STRING password
 */

function minimumNumber($n, $password) {
    # Return the minimum number of characters to make the password strong
    $digitPresent = False;
    $uppercasePresent = False;
    $lowercasePresent = False;
    $specialPresent = False;

    $specialChars = "!@#$%^&*()-+";

    for ($i = 0; $i < $n; $i++) {
        $char = $password[$i];

        if (is_numeric($char)) {
            $digitPresent = True;
        }
        elseif (ctype_upper($char)) {
            $uppercasePresent = True;
        }
        elseif (ctype_lower($char)) {
            $lowercasePresent = True;
        }
        elseif (strpos($specialChars, $char) !== False) {
            $specialPresent = True;
        }
    }

    $requiredCount = 0;

    if (!$digitPresent) {
        $requiredCount++;
    }

    if (!$uppercasePresent) {
        $requiredCount++;
    }

    if (!$lowercasePresent) {
        $requiredCount++;
    }

    if (!$specialPresent) {
        $requiredCount++;
    }

    $additionalChars = max(0, 6 - $n);

    return max($requiredCount, $additionalChars);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$password = rtrim(fgets(STDIN), "\r\n");
$answer = minimumNumber($n, $password);

fwrite($fptr, $answer . "\n");
fclose($fptr);
