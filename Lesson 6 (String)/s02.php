<?php
// Ascii Code
// echo ord('A');
// echo chr(65);

// for ($i=0; $i<128 ; $i++) { 
//     echo chr($i) . PHP_EOL;
// }

$string = "Hello World";
echo substr($string, -8, -2);
echo PHP_EOL;
$length = strlen($string)-1;

for ($i=$length; $i>=0 ; $i--) { 
    echo $string[$i];
}

$length = strlen($string);
echo PHP_EOL;
for ($i=1; $i<=$length ; $i++) { 
    echo $string[$i*-1];
}

echo PHP_EOL;
echo strrev($string);