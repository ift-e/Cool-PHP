<?php

$food = [
    'fav_food' => 'biryani, Beef, Chicken ',
    'drink' => '7up, Pepsi, Cocacola',
    'fruits' => 'Apple, Orange',
];
$food['fruits'] .= ", Guava";

$keys = array_keys($food);

for($i = 0; $i<count($keys); $i++){
    $key = $keys[$i];
    echo $food[$key]."\n";
}

