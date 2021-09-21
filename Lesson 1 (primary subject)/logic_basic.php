<?php
/* Logical Operator
    ==
    !=
    <
    >
    <=
    >=
    &&
    ||

*/
$age = 15;
if($age>=13 && $age<=19){
    echo "Teenager Guy's";
}

echo "\n";

$year = 2014;

if($year % 4==0 && $year % 100==0 && $year % 400==0){
    echo "{$year} is a Leap Year";
}
elseif($year % 4 == 0 && $year % 100 == 0){
    echo "{$year} is not Leap Year";
}
elseif($year % 4 == 0){
    echo "{$year} is a Leap Year";
}
else{
    echo "{$year} is a not Leap Year";
}
echo "\n";

if($year%4==0 && ($year%100 != 0 || $year%400==0)){
    echo "{$year} is a Leap Year";
}else{
    echo "{$year} is a not Leap year";
}

// if(){
// }


$number = 5;

$number+=5;
echo $number;