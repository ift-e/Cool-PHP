<?php

trait NumberSeriesOne{
    function NumberSeriesA(){
        echo "Number Seris A\n";
    }
    function NumberSeriesB(){
        echo "Number Seris B\n";
    }
}

trait NumberSeriesTwo{
    use NumberSeriesOne;
    function NumberSeriesC(){
        echo "Number Seris C\n";
        $this->numberSeriesB();
    }
    function NumberSeriesD(){
        echo "Number Seris D\n";
    }
}


class NumberSeries{
    use NumberSeriesTwo;
}

$ns = new NumberSeries;
$ns->NumberSeriesA();
$ns->NumberSeriesB();
$ns->NumberSeriesC();
$ns->NumberSeriesD();

