<?php

/*
 * Complete the 'twoPluses' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function twoPluses($grid) {
    # Write your code here
    $n = count($grid);
    $m = strlen($grid[0]);

    function isValidPlus($grid, $r, $c, $size, $n, $m) {
        if ($r - $size < 0 || $r + $size >= $n || $c - $size < 0 || $c + $size >= $m) {
            return False;
        }
        for ($i = 0; $i <= $size; $i++) {
            if ($grid[$r - $i][$c] != 'G' || $grid[$r + $i][$c] != 'G' || $grid[$r][$c - $i] != 'G' || $grid[$r][$c + $i] != 'G') {
                return False;
            }
        }
        return True;
    }

    $pluses = array();
    for ($r = 0; $r < $n; $r++) {
        for ($c = 0; $c < $m; $c++) {
            $size = 0;
            while (isValidPlus($grid, $r, $c, $size, $n, $m)) {
                $pluses[] = array($r, $c, $size);
                $size++;
            }
        }
    }

    function getPlusCells($r, $c, $size) {
        $cells = array();
        for ($i = 0; $i <= $size; $i++) {
            $cells[] = array($r - $i, $c);
            $cells[] = array($r + $i, $c);
            $cells[] = array($r, $c - $i);
            $cells[] = array($r, $c + $i);
        }
        return $cells;
    }

    $maxProduct = 0;

    for ($i = 0; $i < count($pluses); $i++) {
        list($r1, $c1, $size1) = $pluses[$i];
        $area1 = 1 + $size1 * 4;
        $plus1Cells = getPlusCells($r1, $c1, $size1);

        for ($j = $i + 1; $j < count($pluses); $j++) {
            list($r2, $c2, $size2) = $pluses[$j];
            $area2 = 1 + $size2 * 4;
            $plus2Cells = getPlusCells($r2, $c2, $size2);

            $overlap = False;
            foreach ($plus1Cells as $cell1) {
                if (in_array($cell1, $plus2Cells)) {
                    $overlap = True;
                    break;
                }
            }

            if (!$overlap) {
                $maxProduct = max($maxProduct, $area1 * $area2);
            }
        }
    }

    return $maxProduct;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);
$m = intval($first_multiple_input[1]);

$grid = array();

for ($i = 0; $i < $n; $i++) {
    $grid_item = rtrim(fgets(STDIN), "\r\n");
    $grid[] = $grid_item;
}

$result = twoPluses($grid);

fwrite($fptr, $result . "\n");
fclose($fptr);
