<?php
// Array Walk
$number = array(1, 2, 3, 4, 5);
function square($n){
    printf("This %d number square is %d".PHP_EOL, $n, $n*$n);
}
array_walk($number, 'square');


// Array Map
$a1=array("C","D","R");
$a2=array("Cow","Dog","Rat");

function map($a1, $a2){
    return [$a1=>$a2];
}
$new_array = array_map('map', $a1, $a2);
print_r($new_array);


// Array filter
$number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

function odd($n){
    return $n%2==1 ;
}

$odd = array_filter($number, 'odd');
print_r($odd);


$name = array('rabbi', 'ifte', 'rasel', 'islam', 'reaid', 'amir', 'rony');

function filterR($name){
    return $name[0]=='r';
}

$nameR = array_filter($name, 'filterR');
print_r($nameR);

// Array Reduce
$number = array(1, 2, 3, 4, 5);
function sum($o, $n){
    if($n%2==0){
        return $o+$n;
    }
    return $o;
}
$result = array_reduce($number, 'sum');
echo $result;
