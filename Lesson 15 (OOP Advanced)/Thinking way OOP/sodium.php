<?php
// Thinking in an Object-Oriented Way
// It's just code to understand the concept

class Sodium{
    static function addFrom($fromName): Sodium
    {
        return new Sodium;
    }
    function addColumn($columnSize): Sodium
    {
        return $this;
    }
    function addFields(FieldInterface ...$fields): Sodium
    {
        return $this;
    }
}

interface FieldInterface{
    static function create():FieldInterface;
    function setId():FieldInterface;
    function setLable():FieldInterface;
    function setDefault():FieldInterface;
    function setValue():FieldInterface;
}

class AbstractField implements FieldInterface{
    static function create(): FieldInterface{}
    function setId():FieldInterface{}
    function setLable():FieldInterface{}
    function setDefault():FieldInterface{}
    function setValue():FieldInterface{}
}

// class FieldFactory{
//     static function createTextField(): FieldInterface{}
//     static function createRadio(): FieldInterface{}
// }

class TextFiled extends AbstractField{

}

class Radio extends AbstractField{

}

class GoogleMaps extends AbstractField{

}


// Sodium::addFrom("myFrom")->addColumn(4)->addFields(
//     [
//         FieldFactory::createTextField()->setId()->setDefault()->setValue(),
//         FieldFactory::createRadio()->setId()->setDefault()->setValue(),
//     ]
// );

// update 1
// Sodium::addFrom("myFrom")->addColumn(4)->addFields(
    // FieldFactory::createTextField()->setId()->setDefault()->setValue(),
    // FieldFactory::createRadio()->setId()->setDefault()->setValue(),
// );

// update 2
Sodimu::addFrom("MyFrom")->addColumn(7)->addFields(
    TextFiled::create('id')->setValue()->setLable(),
    Redio::create()->setLable(),
    GoogleMaps::create()->setValue()->setDefault(),
);
