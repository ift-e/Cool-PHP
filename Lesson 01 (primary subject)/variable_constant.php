<?php
// variable
$question = "How are you";
$city =  "dhaka";
$dhaka = "Bashaboo";

echo "Hello! {$question} {$$city} \n";



// Constant
define('HW', "Home Work");

// Advanced solution
$constant = "constant";
echo "{$constant('HW')} \n";

// Simple solution
echo HW;

