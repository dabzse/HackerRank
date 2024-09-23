<?php

/*
 * Complete the 'sillyGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER n as parameter.
 */

function sieve_of_eratosthenes($n) {
    $primes = array_fill(0, $n + 1, True);
    $p = 2;

    while ($p * $p <= $n) {
        if ($primes[$p] == True) {
            for ($i = $p * $p; $i <= $n; $i += $p) {
                $primes[$i] = False;
            }
        }
        $p++;
    }

    $prime_count = 0;
    for ($p = 2; $p <= $n; $p++) {
        if ($primes[$p] == True) {
            $prime_count++;
        }
    }

    return $prime_count;
}

function sillyGame($n)
{
    # Write your code here
    $prime_count = sieve_of_eratosthenes($n);

    if ($prime_count % 2 == 1) {
        return "Alice";
    } else {
        return "Bob";
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$g = intval(trim(fgets(STDIN)));

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = sillyGame($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
