<?php
$var = 434;
var_dump($var);

$monitor = "hp";
$keybroad = "a4tech";
$mouse = "a4tech";

printf("my monitor name is %s & my keybroad name is %s \n", strtoupper($monitor), $keybroad);

$num1 = 12;
// pre Increment
$num2 = ++$num1;
echo "$num2 \n";

$fname = "Ifte";
$lname = "Hossain";

printf('His name is %2$s %1$s', $lname, $fname);
printf("\n");
printf('His name is %2$s %1$s', "Hossain", "Ifte");
printf("\n");
printf("%.3f", 45.58975);
printf("\n");
printf("%05d", 45343324);


$lng_name = "PHP";
define('framework', 'Laravel');
printf('My fav programming lng is %1$s my fav framework is %2$s', $lng_name, constant('framework'));

echo "\n";


printf("%010.2f",454.250);
