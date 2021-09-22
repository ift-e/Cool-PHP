<?php
/**
 * Determines if the Argument Even Or Odd
*/
function isEven($n)//Parameter
{
    if($n % 2 == 0){
        return true;
    }
    return false;
}


/*
 * Factorial 5*4*3*2*1 
 */
function factorial(int $x){
    /**
     * PHP < 7+ = int
     * PHP > 7
     if(gettype($x) != "integer"){
         return "Invalid Argument";
     }
    */
    $result = 1;
    for($i=$x; $i>1; $i--){
        $result*=$i;
    }
    return $result;
}

// Default value
function serve($foodName="Biryani", $quantity="2 Plate"){
    echo "\n{$quantity} of {$foodName} has/have been served";
}


function sum3(int $x, int $y, int $z){
    return $x+$y+$z;
}

function sumUnlimited(int ...$n):int{
    $result = 0;
    for($i=0; $i<count($n); $i++){
        $result+=$n[$i];
    }
    return $result;
}

// Recursive function
function printN($i){
    if($i>=10){
        return;
    }
    echo "$i \n";
    $i++;
    printN($i);
}


function printNumber($start, $end, $stepping=1){
    if($start >= $end){
        return;
    }
    echo "$start\n";
    $start+=$stepping;
    printNumber($start, $end, $stepping);
}