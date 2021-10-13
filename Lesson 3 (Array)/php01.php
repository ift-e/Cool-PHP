<?php

$students =  array("Ifte", "Hossain", "Badhon", 52142);
$roll = [12, 13, 25]; 
$n = count($students);

$students[3] = "Meaw";
/** Data add * remove
 * array_shift(); // remove fast value
 * array_unshift(); // remove last value
 * array_pop();
 * array_push();
 */

array_shift($students); // remoe value in fast
array_pop($students); // remove value in last
array_unshift($students, "nusrat"); // add value in fast
array_push($students, "reaid"); // add value in last

for($i = 0; $i<$n; $i++){
    echo $students[$i]."\n";
}
