<?php

class FileWriter{
    private $fileName;
    static $instance = [];
    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    static function getInstance($fileName)
    {
        if (!isset(self::$instance[$fileName])) {
            self::$instance[$fileName] = new FileWriter($fileName);
        }

        return self::$instance[$fileName];
    }

    function writeData($data){
        echo "Writing Data to {$this->fileName}\n";
    }

    function dump(){
        print_r(self::$instance);
    }

}

$fw1 = FileWriter::getInstance("/tmp/abcd.txt");
$fw2 = FileWriter::getInstance("/tmp/abc.txt");
$fw3 = FileWriter::getInstance("/tmp/abcd.txt");
FileWriter::getInstance('/tmp/ab.txt')->writeData('Some Data');

$fw1->writeData('Some Data');
$fw2->writeData('Some Data');
$fw3->writeData('Some Data');

$fw3->dump();