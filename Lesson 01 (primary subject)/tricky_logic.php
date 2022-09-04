<?php
// 1- divisible by 4
// 2- divisible by 100
// 3- divisible by 400

$year = 500;

if($year % 4 ==0 && $year % 100 ==0 && $year % 400 ==0){
    echo "{$year} is a leap Year ifte";
}
elseif($year % 4 ==0 && $year % 100 ==0){
    echo "{$year} is a not leap year";
}
elseif($year % 4 == 0){
    echo "{$year} is a leap Year reaid";
}
else{
    echo "{$year} is a not leap Year";
}

echo "\n";

if($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)){
    echo "{$year} is a leap year";
}
else {
    echo "{$year} is a not leap year";
}

echo "\n";
$pani = "valo" ;
$cock = "khrp";
$food = "valo";
if($pani == "valo" && $cock == "valo" && $food == "valo"){
    echo "hoo cholbo 3";
}
elseif($pani == "valo" && $cock == "valo"){
    echo "cholbo nah 2";
}
elseif($pani == "valo"){
    echo "hoo cholbo 1";
}
else{
    echo "cholbo nah 3";
}


if($pani == "valo" && ($cock != "valo" || $food == "valo")){
    echo "\nhoo cholbo";
}
else{
    echo "\ncholbo nah";
}