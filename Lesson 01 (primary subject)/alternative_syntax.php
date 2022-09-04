<?php

$n = 7;

$result = ($n%2==0) ? "A" : (($n == 10) ? "B":($n==5)?"c":"D");

echo $result;

for($i=1; $i<=10; $i++){
    // echo $i;
    echo PHP_EOL;
    for($j=1; $j<$i; $j++){
        echo "*";
    }
}

echo PHP_EOL;
$i = 1;
while($i<=10){
    $i++;
    echo $i.PHP_EOL;
}

echo PHP_EOL;
$i = 1;

do{
    $i++;
    echo $i.PHP_EOL;
}while($i<10);

echo PHP_EOL;
// mutiple spending
for($i=10, $j=1; $i>0; $i--, $j++){
    echo $i.":".$j;
    echo PHP_EOL;
}

$n = 3;
for($i=$n, $factorial=1; $i>1; $i--){
    $factorial *= $i;
}

printf("Factorial of %d is %d", $n, $factorial); 

