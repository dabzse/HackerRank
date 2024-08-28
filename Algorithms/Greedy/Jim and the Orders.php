<?php

/*
 * Complete the 'jimOrders' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts 2D_INTEGER_ARRAY orders as parameter.
 */

function jimOrders($orders) {
    # Write your code here
    $orders_with_index = [];
    foreach ($orders as $index => $order) {
        $total_time = $order[0] + $order[1];
        $orders_with_index[] = [$index + 1, $total_time];
    }

    usort($orders_with_index, function($a, $b) {
        if ($a[1] == $b[1]) {
            return $a[0] - $b[0];
        }
        return $a[1] - $b[1];
    });

    $result = array_map(function($order) {
        return $order[0];
    }, $orders_with_index);

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$orders = array();

for ($i = 0; $i < $n; $i++) {
    $orders_temp = rtrim(fgets(STDIN));

    $orders[] = array_map('intval', preg_split('/ /', $orders_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = jimOrders($orders);

fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);
