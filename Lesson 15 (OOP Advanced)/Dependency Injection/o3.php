<?php
// Dependency Injection Another Example

interface BaseStorage
{
    function setFileName($fn);
    function writeDate($data);
    function mode($mode);
}

class Storage implements BaseStorage
{
    private $fn;
    private $mode;
    function __construct($fn, $mode = null)
    {
        $this->setFileName($fn);
        $this->mode = $mode;
    }

    function setFileName($fn)
    {
        $this->fn = $fn;
    }

    function writeDate($data)
    {
        file_put_contents($this->fn, $data, $this->mode);
    }

    function mode($mode){
        $this->mode = $mode;
    }
}

// class DataManager{
//     function SaveData($fileName, $data){
//         $storage = new Storage($fileName);
//         $storage->writeDate($data);
//     }
// }


class DataManager
{
    function SaveData(BaseStorage $storage, $data)
    {
        $storage->writeDate($data);
    }
}


$file = new Storage("./test/abcd.txt");
$file->mode(FILE_APPEND);

$dm = new DataManager();
$dm->saveData($file, "9 My Data ");
