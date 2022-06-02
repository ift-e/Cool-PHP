<?php
// Manual way to open recursive directory & read
// separated the names of the file folders by pushing them into two different properties arrays

class Dir{
    private $directories = [];
    private $files = [];
    private $path;
    private $directoryObjects=[];

    function __construct($path){
        if(is_readable($path)){
            $this->path = $path;
            $entries = scandir($path);
            foreach ($entries as $entrie) {
                if ("." != $entrie && ".." != $entrie) {
                    if (is_dir($this->path."/".$entrie)) {
                        array_push($this->directories, $entrie);
                    } else {
                        array_push($this->files, $entrie);
                    }
                }
            }
        }
    }

    function getDirectory($index){
        // Check Available directories varialbe. this is a folder array /////// 
        if(isset($this->directories[$index])){
            if(!isset($this->directoryObjects[$index])){
                $this->directoryObjects[$index] = new Dir($this->path . "/" . $this->directories[$index]);
                // echo "Creating New Object";
            }
            // else{
            //     echo "Using Old Object";
            // }
            return $this->directoryObjects[$index];
        }else{
            throw new Exception("Directory Doesn't Exists");
        }
    }

    function getDirectories(){
        return $this->directories;
    }

    function getFiles(){
        return $this->files;
    }

}




$directory = new Dir(getcwd());
print_r($directory->getDirectories());


$Lesson_11 = $directory->getDirectory(3);
print_r($Lesson_11->getDirectories());
// print_r($Lesson_10->getFiles());

$Lesson_11 = $directory->getDirectory(3);
print_r($Lesson_11->getDirectories());

$oop = $Lesson_11->getDirectory(2);
// print_r($cookie->getDirectories());
print_r($oop->getFiles());