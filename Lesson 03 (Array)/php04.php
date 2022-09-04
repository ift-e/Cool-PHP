<?php

$students = array(
    'fname' => 'ifte',
    'lname' => 'Badhon',
    'age' => 18,
    'class' => 12,
);


printf("%s %s \n", $students['fname'], $students['lname']);

$ser_array = serialize($students);
$unser_array = unserialize($ser_array);
print_r($unser_array);

$ser_array = json_encode($students);
$unser_array = json_decode($ser_array, true /*passing data for array format*/);
print_r($unser_array);