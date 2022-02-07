<?php

function factorial($n){ // 6*5*4*3*2*1
    $result = 1;
    for($i=$n; $i>1; $i--){
        $result*=$i;
    }
    return $result;
}
function factorial2($n){ // 6*5*4*3*2*1
    $result = 1;
    for($i=1; $i<=$n; $i++){
        $result*=$i;
    }
    return $result;
}

$startTime = microtime(true);
echo factorial2(10);
$endTime =  microtime(true);

$executionTime = $endTime - $startTime;
echo "\n";
printf("%10.8f", $executionTime);


