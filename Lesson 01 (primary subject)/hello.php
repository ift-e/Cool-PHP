<?php 
$n = -13;
$r = $n % 2;
switch($r){
    case 0;
        switch ($n) {
            case ($n > 0):
                echo "$n is a positive even number";
                break;
            
            default:
                echo "$n is a negative even number";
                break;
        }
    break;
    default:
        switch ($n) {
            case ($n > 0):
                echo "$n is a positive odd number";
                break;
            
            default:
                echo "$n is a negative odd number";
                break;
        }
}
echo PHP_EOL;

switch (true) {
    case (0 ==$r && $n>0):
        echo "$n is a positive even number";
        break;
    case (0 ==$r && $n<0):
        echo "$n is a negative even number";
        break;
    case (1 ==$r && $n>0):
        echo "$n is a positive Odd number";
        break;
    case (-1==$r && $n<0):
        echo "$n is a negative Odd number";
        break;
}

echo PHP_EOL;
for ($i=1; $i < 10 ; $i++) { 
    echo PHP_EOL;
    for($j=0; $j<$i; $j++){
        echo "*";
    }
}

echo PHP_EOL;
$r = 1;
while($r<10){
    echo $r;
    $r++;
}
$r = 1;
echo PHP_EOL;
do{
    echo $r;
    $r++;
}while($r<10);

echo PHP_EOL;
// 5 = 5*4*3*2*1
for($i=4, $fac=1; $i>1; $i--){
    $fac*=$i;
}
echo $fac;


$result = 1;
for($i=1; $i<10; $i++){
    $result*=$i;
    echo "fac of $i is $result". PHP_EOL;
}
echo PHP_EOL;
echo PHP_EOL;

function printNum($start, $end){
    if($start > $end){
        return;
    }
    echo $start. PHP_EOL;
    $start++;
    printNum($start, $end);
}
printNum(2, 10);

function factorial($n){
    if($n <= 1){
        return $n;
    }
    return $n * factorial($n - 1);
}
echo factorial(3);


$array = [
    'dfkldf',
    'djfkld',
    'wer',
    'tyyret',
];

var_dump($array);