<?php

$number = 25;
$result = $number % 2;

switch($result){
    case 0:
        echo "$number is a even number";
        break;
    default:
        echo "$number is a odd number";
}

echo "\n";
$color = "Green";

switch($color){
    case 'Red':
    case 'Green':
        echo "$color is our favorite Color";
        break;
    default:
        echo "$color is our not favorite Color";
}

echo "\n";
echo "\n";

// nested Switch Case
$n = -11;
$r = $n % 2;
switch($r){
    case 0:
        switch($n){
            case ($n > 0 ):
                echo "$n this is even and positive Number";
                break;
            case ($n < 0 ):
                echo "$n this is even and negative Number";
                break;
        }
        break;
    default:
        switch($n){
            case($n > 0):
                echo "$n This is odd and possitive number";
                break;
            case ($n < 0):
                echo "$n this is odd and negative Number";
                break;
        }
}
echo "\n";
switch($r){
    case ($r == 0 && $n > 0);
        echo "$n this is even and positive Number";
        break;
    case ($r == 0 && $n < 0);
        echo "$n this is even and negative Number";
        break;
    case ($r == 1 && $n > 0);
        echo "$n This is odd and possitive number";
        break;
    case ($r == -1 && $n < 0);
        echo "$n this is odd and negative Number";
        break;
}

echo "\n";

$ball = "5 ball";

switch($ball){
    case (string) 5:
        echo "Five";
        break;
    case (string) "5 ball":
        echo "Five Ball";
        break;
    default:
        echo "No Ball";
}