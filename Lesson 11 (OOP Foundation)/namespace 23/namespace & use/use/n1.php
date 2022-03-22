<?php
// namespace Project;
use Project\Bike as Pulsar;
use Project\Motorcycles\Bike as Yamaha;

include_once "c1.php";
include_once "c2.php";

$b = new Pulsar();
$b->getName();


$y = new Yamaha();
$y->getName();