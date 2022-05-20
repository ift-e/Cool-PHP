<?php
trait NumberSeriesOne
{
    function NumberSeriesA()
    {
        echo "Number Seris A\n";
    }
}

trait NumberSeriesTwo{
    function NumberSeriesA(){
        echo "Number Series A++\n";
    }
}


class NumberSeries
{
    use NumberSeriesOne, NumberSeriesTwo{
        NumberSeriesOne::NumberSeriesA as NumberSeriesAA;
        NumberSeriesTwo::NumberSeriesA as NumberSeriesAAA;
    }

    function NumberSeriesA()
    {
        echo "Printing + printing Number Series A";
    }
}

$ns = new NumberSeries;
$ns->NumberSeriesAAA();
