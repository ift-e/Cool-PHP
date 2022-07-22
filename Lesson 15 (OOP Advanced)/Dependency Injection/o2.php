<?php
// dependency injection

interface BaseStudent
{
    function displayName();
}


class Student implements BaseStudent
{
    private $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    function displayName()
    {
        echo "Hello Form " . $this->name;
    }
}

class ImprovedStudent implements BaseStudent
{
    private $name;
    private $title;
    function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }
    function displayName()
    {
        echo "Hello Form {$this->title} {$this->name}";
    }
}
// class StudentManager{
//     function intoduceStudent($name){
//         $st = new Student($name);
//         $st->displayName();
//     }
// }


class StudentManager
{
    function intoduceStudent(BaseStudent $name)
    {
        $name->displayName();
    }
}

$st = new Student("Ifte");
$ist = new ImprovedStudent("Ifte", "MD.");

$sm = new StudentManager();
$sm->intoduceStudent($ist);
