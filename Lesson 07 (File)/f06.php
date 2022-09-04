<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f5.txt";
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
// fast put data
// $data = serialize($students);
// file_put_contents($filename, $data);


// get data 
$dataFormFile = file_get_contents($filename);
$allStudents = unserialize($dataFormFile);
// delete data
// unset($allStudents[1]);
// new data
$newstudents = array(
    'fname' => 'saimon',
    'lname' => 'hasan',
    'age' => 18,
    'class' => 12,
    'roll' => 12,
);

array_push($allStudents, $newstudents);

$data = serialize($allStudents);
file_put_contents($filename, $data);


