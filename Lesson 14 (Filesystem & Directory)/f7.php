<?php
// == How to copy all files from one directory to another ///

function copyDir($source, $destination)
{
    $fileCount = 0;
    $directoryCount = 1;
    $source = rtrim($source, "/");
    $destination = rtrim($destination, "/");

    if (!file_exists($destination)) {
        mkdir($destination);
    }

    foreach (scandir($source) as $file) {
        if ("." != $file && ".." != $file) {
            $sourcePath = $source . DIRECTORY_SEPARATOR . $file;
            $destinationPath = $destination . DIRECTORY_SEPARATOR . $file;
            if (is_dir($sourcePath)) {
                $result = copyDir($sourcePath, $destinationPath);
                $fileCount += $result[0];
                $directoryCount += $result[1];
            } elseif (is_file($sourcePath)) {
                $fileCount++;
                copy($sourcePath, $destinationPath);
            }
        }
    }
    return array($fileCount, $directoryCount);
}

$source = getcwd() . "/source/Lesson 8 (CRUD)";
$destination = getcwd() . "/target/Lesson 8 (CRUD)";
$fc = copyDir($source, $destination);
echo "Total {$fc[0]} files have been copied and {$fc[1]} directories have been copied";
