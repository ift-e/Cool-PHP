<?php

for($i =1; $i<10; $i++){
    if($i > 3){
        continue;
        // break;
    }
    echo $i;
    echo "\n";
}

//fibonacci series 0 1 1 2 3 5 7 12

$veryOld = 0;
$old = 1;
$new = 1;

for($i=0; $i<10; $i++){
    echo $veryOld." ";
    $veryOld = $old;
    $old = $new;
    $new = $veryOld + $old;
}

echo "\n";

// spaceship operator
$x = 6;
$y = 5;
$result = $x <=> $y;
if($result == 1){
    echo "Boro Ache";
}
else if($result == 0){
    echo "Soman Ache";
}
else if($result == -1){
    echo "Choto Ache";
}

// Null Operator
