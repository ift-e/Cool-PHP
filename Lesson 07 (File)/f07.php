<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f6.txt";
$students =  array(
    array(
        'fname' => 'ifte',
        'lname' => 'hossain',
        'age' => 18,
        'class' => 12,
        'roll' => 20,
    ),
    array(
        'fname' => 'reaid',
        'lname' => 'hossain',
        'age' => 17,
        'class' => 11,
        'roll' => 18,
    ),
    array(
        'fname' => 'md',
        'lname' => 'faisal',
        'age' => 21,
        'class' => 13,
        'roll' => 2,
    ),
    array(
        'fname' => 'tanvir',
        'lname' => 'ahmed',
        'age' => 19,
        'class' => 13,
        'roll' => 1,
    ),
);

// $encodeData = json_encode($students);
// file_put_contents($filename, $encodeData);

$getData = file_get_contents($filename);
$decodeData = json_decode($getData, true);
print_r($decodeData);