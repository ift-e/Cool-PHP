<?php

class Fund{
    private $fund;

    public function __construct($initialFund = 0){
        $this->fund = $initialFund;
    }

    public function addFund($money){
        $this->fund+=$money;
    }

    public function deductFund($money){
        $this->fund-=$money;
    }

    public function getTotal(){
        echo "Total fund is {$this->fund}";
    }
}

$ourFund = new Fund(10);
$ourFund->addFund(15);
$ourFund->deductFund(4);
echo $ourFund->getTotal();