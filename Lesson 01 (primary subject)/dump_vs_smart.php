<?php
// Dump Code
$j = 1;
for($s=1; $s <=10; $s++){
    for($n=$s, $f=1; $n>1; $n--){
        $f *= $n ;
        $j++;
    }
    echo "Factorial of $s is $f \n";
}
echo "\n Running count $j \n";


// Smart Code
$j = 1;
$result = 1;
for($s=1; $s <=10; $s++){
    $result *= $s;
    $j++;
    echo "Factorial of $s is $result \n";
}
echo "\n Running count $j \n"; 