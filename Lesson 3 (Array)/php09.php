<?php

$a1 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2 = array("e"=>"red","b"=>"green","g"=>"blue");

$common = array_intersect($a2,$a1);
// $common = array_intersect_assoc($a2,$a1);
print_r($common);

// $difference = array_diff($a1, $a2);
$difference = array_diff_assoc($a1, $a2);

print_r($difference);