<?php
// try SPL building class DirectoryIterator RecursiveDirectoryIterator, RecursiveIteratorIterator

$size = 0;
$rdi = new RecursiveDirectoryIterator(getcwd(), RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($rdi);
$phpF = 0;

foreach($files as $file){
    if($file->isFile()){
        $size+=$file->getSize();
    }

    if($file->getFileName() == "f4.php"){
        echo $file->getPath().DIRECTORY_SEPARATOR.$file->getFileName()."\n";
    }

    if ($file->getExtension() == "php") {
        $phpF++;
    }
}


echo "Every Directory All file total size $size Byte\n";

echo "Our Total PHP Files $phpF\n";