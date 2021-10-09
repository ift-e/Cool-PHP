<?php
include_once 'make_function.php';

$number = 3;
if(isEven($number)){
    echo "This is Even Number";
}else {
    echo "This is Odd Number";
}

echo "\n";
$fac = 5;

echo "Factorial of {$fac} is ".factorial($fac);

serve('Juice', '2 cups');

echo "\n";
echo sumUnlimited(5, 5, 5, 5,5);

echo "\n";

printNumber(1, 20, 2);

isvalue('ifte');