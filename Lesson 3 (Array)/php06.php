<?php

$people = array('fname'=> 'ifte', 'lname'=>'badhon');
unset($people['lname']);
print_r($people);

$random =  ['a'=> 10, 'b'=> 20, 'c'=> 30, 'd'=> 40, 12=>50, 'e'=> 60];
// array_slice(array, start, length, preserve)
$slice = array_slice($random, 2, 4, true);

print_r($slice);



$color = array("red","green","blue","yellow","brown");
// array_slice(array, start, length, array)
$new_color = array('orange', 'purpal', 'black');
$splice = array_splice($color, 2, -1, $new_color);

print_r($splice);
print_r($color);

