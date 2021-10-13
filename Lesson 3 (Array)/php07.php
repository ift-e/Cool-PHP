<?php

$fruits = array('fav'=>'apple', 'banana','orange', 'mango', 'plam', 'dates');

$newfruits1 = array_slice($fruits, 0, 3, true);
$newfruits2 = array_slice($fruits, 3, null, true);

$newfruits = array_merge($newfruits1,$newfruits2);
print_r($newfruits1);
print_r($newfruits2);
print_r($newfruits);



$random = array(
    'a' => 10,
    'b' => 20,
    'c' => 30,
    'd' => 40,
    'e' => 50,
);
$add_random1 = array_slice($random, 0, 2, true);
$add_random2  = array_slice($random, 2, null, true);
$new = array('f'=>60, 'j'=> 70);

print_r($add_random1+$new+$add_random2);