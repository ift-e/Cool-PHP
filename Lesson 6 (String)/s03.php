<?php
// String Broken With Token
$string = "hello world,world how are you!";
$parts = explode(" ",$string);
print_r($parts);

// print_r(implode(" ", $parts));


// A Problem Solving
$char = str_split($string);
$count = count($char);
$array = [];
echo "\n";
foreach ($char as $key => $value) {
    $countNum = 0;
    for ($i=0; $i < $count ; $i++) { 
        if($value == $char[$i]){
            $countNum+=1;
        }
    }
    // echo "$value = $countNum"."</br>";
    $array += [$value=> $countNum];
}
print_r($array);

// multiple separetor
$parts2 =  strtok($string, " ,");
while ($parts2 !== false) {
    echo $parts2 . "\n";
    $parts2 = strtok(" ,");
}

$meaw = preg_split("/ |,/", $string);

print_r($meaw);