<?php
class parentClass{
    protected $name;
    function __construct($nam){
        $this->name = $nam;
        $this->sayHi();
    }

    public function sayHi(){
        echo "Hi form {$this->name}\n";
    }
}

class childClass extends parentClass{
    function sayHi(){
        parent::sayHi();
        echo "Hello";
    }
}