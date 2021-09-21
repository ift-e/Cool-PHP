<?php

$i = 10; 
$f = $i++;

/* Discussion
    $f = $i;
    $i = $i+1;
*/
echo $f, "\n" ,$i;

$i = 12;
$f = ++$i;

/* Discussion
    $i = $i + 1;
    $f = $i;
*/

echo $f, "\n", $i;