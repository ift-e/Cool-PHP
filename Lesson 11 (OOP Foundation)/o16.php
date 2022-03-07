<?php
class DistrictCollection implements IteratorAggregate, Countable{
    private $districts;

    function __construct(){
        $this->districts = array();
    }
    function add($districts){
        array_push($this->districts, $districts);
    }
    function getIterator(): ArrayIterator{
        return new ArrayIterator($this->districts);
    }
    function count():int {
        return count($this->districts);
    }
}

$districts = new DistrictCollection;
$districts->add("Dhaka");
$districts->add("Rajshahi");
$districts->add("Bogra");
$districts->add("Rangpur");
$districts->add("Sylhet");

foreach ($districts as $district) {
    echo $district ."\n";
}

echo count($districts);