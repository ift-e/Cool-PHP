<?php

trait NumberSeriesOne
{
    function NumberSeriesA()
    {
        echo "Number Seris A\n";
        parent::NumberSeriesA();
    }

    function NumberSeriesB()
    {
        echo "Number Seris B\n";
    }
}


class SomeNumber
{
    function NumberSeriesA()
    {
        echo "Printing Number Seris A\n";
    }
}


class NumbrSeries extends SomeNumber
{
    use NumberSeriesOne;
}

$ns = new NumbrSeries;
$ns->numberSeriesA();
