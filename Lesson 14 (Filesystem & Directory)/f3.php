<?php
// Making recursive directory
mkdir("test2/d1/d2/d3", 0777, true);
file_put_contents('test2/f.txt','hello world');
file_put_contents('test2/d1/f.txt','hello world');
file_put_contents('test2/d1/d2/f.txt','hello world');
file_put_contents('test2/d1/d2/f2.txt','hello world');
sleep(10);
// unlink("test/f.txt");
// rmdir("test");



// Recursive File & folder delete
function deleteDir($path){
    if(!is_readable($path)){
        return;
    }

    $filesInPath = scandir($path);

    if(count($filesInPath) > 2){
        foreach($filesInPath as $files){
            if($files != "." && $files != ".."){
                $filePath = $path . DIRECTORY_SEPARATOR . $files;
                if(is_dir($filePath)){
                    deleteDir($filePath);
                }else{
                    unlink($filePath);
                }
            }
        }
    }
    rmdir($path);

}


deleteDir(getcwd().DIRECTORY_SEPARATOR."test");

