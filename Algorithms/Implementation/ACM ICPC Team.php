<?php

/*
 * Complete the 'acmTeam' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts STRING_ARRAY topic as parameter.
 */

function acmTeam($topic) {
    # Write your code here
    $max_topics = 0;
    $team_count = 0;

    $n = count($topic);
    $m = strlen($topic[0]);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $topics = 0;

            for ($k = 0; $k < $m; $k++) {
                if ($topic[$i][$k] == '1' || $topic[$j][$k] == '1') {
                    $topics++;
                }
            }

            if ($topics > $max_topics) {
                $max_topics = $topics;
                $team_count = 1;
            }
            elseif ($topics == $max_topics) {
                $team_count++;
            }
        }
    }

    return array($max_topics, $team_count);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$m = intval($first_multiple_input[1]);

$topic = array();

for ($i = 0; $i < $n; $i++) {
    $topic_item = rtrim(fgets(STDIN), "\r\n");
    $topic[] = $topic_item;
}

$result = acmTeam($topic);

fwrite($fptr, implode("\n", $result) . "\n");
fclose($fptr);
