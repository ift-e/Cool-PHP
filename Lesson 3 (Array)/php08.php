<?php
$fruits = array(10=>'Apple', 100=>'apple', 50=>'banana',30=>'orange', 20=>'mango', 70=>'plam', 90=>'dates');
$number = array(100, 50, 60, 40, 70, 10, 30);
$string = array('ifte4','ifte3', 'ifte1', 'ifte2');
$fruits = array('Apple', 'apple','Banana','banana');
sort($fruits, SORT_STRING | SORT_FLAG_CASE);

print_r($fruits);

$number = array(100, 50, '60', 40, 70, 10, 30);

echo in_array(60, $number, true);
echo "\n";

echo array_search(60, $number);
echo "\n";

echo key_exists(3,$number );

