<?php
// 0 1 1 2 3 5 8


function fibonacci($old, $new, $end){
    static $start;
    $start = $start ?? 1 ;
    if($start>$end){
        return;
    }
    $start++;
    echo "$old "; 
    $_temp = $old+$new;
    $old = $new;
    $new = $_temp;
    fibonacci($old, $new, $end);
}

fibonacci(0, 1, 5);

echo "\n";

function factorial($n){
    if($n <= 1){
        return $n;
    }
    return $n * factorial($n - 1);
}

echo factorial(3);

?>
