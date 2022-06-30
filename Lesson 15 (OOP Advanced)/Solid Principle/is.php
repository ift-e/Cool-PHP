<?php
// It's just code to understand the concept
// interface segregation

interface Vehicles{
    function getName();
    function getMileage();
    function getPrice();
}

interface TwoWheelers{

}

interface FourWheelers{
    
}

interface SixWheelers{

}

class Bike implements Vehicles, TwoWheelers{
    function getName(){}
    function getMileage(){}
    function getPrice(){}
}

class Truck implements Vehicles, SixWheelers{
    function getName(){}
    function getMileage(){}
    function getPrice(){}
}