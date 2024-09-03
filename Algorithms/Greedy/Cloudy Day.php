<?php

/*
 * Complete the 'maximumPeople' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. LONG_INTEGER_ARRAY p
 *  2. LONG_INTEGER_ARRAY x
 *  3. LONG_INTEGER_ARRAY y
 *  4. LONG_INTEGER_ARRAY r
 */

function maximumPeople($p, $x, $y, $r) {
    # Return the maximum number of people that will be in a sunny town after removing exactly one cloud.
    $n = count($p);
    $m = count($y);

    $events = [];

    foreach ($y as $i => $yi) {
        $ri = $r[$i];
        $events[] = [$yi - $ri, 'start', $i];
        $events[] = [$yi + $ri + 1, 'end', $i];
    }

    $towns = [];
    foreach ($x as $i => $xi) {
        $towns[] = [$xi, $p[$i]];
    }
    usort($towns, function($a, $b) {
        return $a[0] - $b[0];
    });

    usort($events, function($a, $b) {
        return $a[0] - $b[0];
    });

    $sunny_population = 0;
    $cloud_effects = array_fill(0, $m, 0);
    $town_index = 0;

    $current_coverage = [];

    foreach ($events as $event) {
        $pos = $event[0];
        $event_type = $event[1];
        $cloud_index = $event[2];

        while ($town_index < $n && $towns[$town_index][0] < $pos) {
            $town_population = $towns[$town_index][1];

            if (count($current_coverage) == 0) {
                $sunny_population += $town_population;
            }
            elseif (count($current_coverage) == 1) {
                $only_cloud = array_keys($current_coverage)[0];
                $cloud_effects[$only_cloud] += $town_population;
            }

            $town_index++;
        }

        if ($event_type == 'start') {
            $current_coverage[$cloud_index] = True;
        }
        elseif ($event_type == 'end') {
            unset($current_coverage[$cloud_index]);
        }
    }

    while ($town_index < $n) {
        $town_population = $towns[$town_index][1];

        if (count($current_coverage) == 0) {
            $sunny_population += $town_population;
        }
        elseif (count($current_coverage) == 1) {
            $only_cloud = array_keys($current_coverage)[0];
            $cloud_effects[$only_cloud] += $town_population;
        }
        $town_index++;
    }
    $max_sunny_population = $sunny_population + max($cloud_effects);

    return $max_sunny_population;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$p_temp = rtrim(fgets(STDIN));
$p = array_map('intval', preg_split('/ /', $p_temp, -1, PREG_SPLIT_NO_EMPTY));

$x_temp = rtrim(fgets(STDIN));
$x = array_map('intval', preg_split('/ /', $x_temp, -1, PREG_SPLIT_NO_EMPTY));

$m = intval(trim(fgets(STDIN)));
$y_temp = rtrim(fgets(STDIN));

$y = array_map('intval', preg_split('/ /', $y_temp, -1, PREG_SPLIT_NO_EMPTY));
$r_temp = rtrim(fgets(STDIN));

$r = array_map('intval', preg_split('/ /', $r_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = maximumPeople($p, $x, $y, $r);

fwrite($fptr, $result . "\n");
fclose($fptr);
