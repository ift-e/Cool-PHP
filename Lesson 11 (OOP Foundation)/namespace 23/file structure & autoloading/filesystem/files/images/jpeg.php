<?php
namespace CloudStorage\FileSystem\Files\Images;

use \CloudStorage\FileSystem\Files\Contracts\ImageContracts;


class Jpeg implements ImageContracts{
    function getDimension(){
        return "100*100";
    }
}