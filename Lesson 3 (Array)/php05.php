<?php
$person =  array('fname'=>'Ifte', 'lname'=>'Hossain');
// Copy by value OR Deep Copy $newperson = $person
// Copy by reference OR shallow copy $newperson = &$person
// $newperson = &$person;
$newperson = $person;
$newperson['lname'] = 'Badhon';
print_r($newperson);
print_r($person);


function meaw($person){
    $person['lname'] .=' Badhon';
    print_r($person);
}

meaw($person);
print_r($person);