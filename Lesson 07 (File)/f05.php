<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f4.txt";
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
// file write
/* $fp = fopen($filename, "w");
foreach ($students as $student) {
    $data = sprintf("%s,%s,%s,%s,%s\n",$student['fname'], $student['lname'], $student['age'], $student['class'], $student['roll']);
    fwrite($fp, $data);
} */

// file read
/*$fp = fopen($filename, "r");
while ($data = fgets($fp)) {
    $student = explode(",", $data);
    printf("Name=%s %s, Age=%s, Class=%s, Roll=%s", $student[0], $student[1], $student[2], $student[3], $student[4]);
}*/

// Another Way
// file write
/* $fp = fopen($filename, "r+");
foreach ($students as $student) {
    fputcsv($fp, $student);
} */

// File read
// while ($student = fgetcsv($fp)) {
//     printf("Name=%s %s, Age=%s, Class=%s, Roll=%s\n", $student[0], $student[1], $student[2], $student[3], $student[4]);
// }

// Add a new students
$fp = fopen($filename, "a+");
$students = array(
    'fname' => 'saimon',
    'lname' => 'hasan',
    'age' => 18,
    'class' => 12,
    'roll' => 12,
);
fputcsv($fp, $students);

// Delete A students row
$data = file($filename);
unset($data[1]);
$fp = fopen($filename, "w");
foreach ($data as $line) {
    fwrite($fp, $line);
}
