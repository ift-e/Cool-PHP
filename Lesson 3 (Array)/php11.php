<?php
$color = array('red', 'green', 'blue', 'orange');

list($r, $g, $b)=$color;
echo $b."\n";

$number = range(1, 10);
$random = mt_rand(0, 9);
$luck = $number[$random];
if($luck % 2 == 0){
    echo "Head";
}else {
    echo "Tail";
}
shuffle($number); //Randomize the order of the elements in the array
echo "\n".$number[2];

// array rand
$color = array('r'=>'red', 'g' => 'green', 'b' => 'blue', 'o' =>'orange');
echo "\n";
$keys = array_rand($color);
echo $color[$keys];