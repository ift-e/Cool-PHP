<?php
// Trim
$string = " Hello peter  how are you , ";
$string = trim($string, " ,"); // rtrim(), ltrim()
echo $string;

// nl2br
$string2 =  "Lorem ipsum dolor, sit amet consectetur adipisicing elit. \n Error quos mollitia aliquid culpa ullam. Earum quae quisquam sint omnis saepe.";

echo nl2br($string2);

// wordwrap
echo "\n";
$string3 = "Lorem ipsum sit amet consectetur, adipisicing elit. Praesentium aperiam molestias dolor nostrum ex modi.";

echo wordwrap($string3, 26);
// echo wordwrap($string3, 26, "\n", true);



// sscnaf
echo "\n";
$name = "Ifte Hossain 1234567890";
$parts = sscanf($name, "%s %s %9d");
// $parts = sscanf($name, "%s %s %9d", $fname, $lname, $n);
// echo $fname;
print_r($parts);
