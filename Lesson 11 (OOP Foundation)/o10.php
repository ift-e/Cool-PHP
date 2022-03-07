<?php
// ================= final keyword example
class OurClass{
    final function hi(){
        echo "Hello";
    }
}

class MyClass extends OurClass{
    
}

$h1 = new MyClass;
$h1->hi();

// ================ force example
echo "\n";

class Student{

}

class Students{
    private $shapes;
    function __construct(){
        $this->shapes = array();
    }

    function addShape(Student $shape){
        array_push($this->shapes, $shape);
    }

    function totalShape(){
        return count($this->shapes);
    }
}

class Students1 extends Student{
    
}

class Students2 extends Student{

}

class Teacher{

}

$shpaeCollection = new Students;
$shpaeCollection->addShape(new Students1() );
$shpaeCollection->addShape(new Students2() );
// $shpaeCollection->addShape(new Teacher() );
echo $shpaeCollection->totalShape();

