<?php
class Name{
    function getName(){
        echo "My name is Ifte Hossain";
    }
}

class NameDecorator{
    public $name;
    function __construct(Name $name)
    {
        $this->name = $name;
    }

    function getName(){
        echo $this->name->getName() . " Badhon";
    }
}

$n = new Name;
$nd = new NameDecorator($n);
$nd->getName();