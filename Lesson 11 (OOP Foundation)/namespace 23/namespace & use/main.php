<?php
namespace Astronomy\Planets;

include "planet.php";
include "earth.php";


// $planet = new \Astronomy\Planets\Planet();
$planet = new Planet();
$planet->getName();
$planet = new Earth();
$planet->getName();