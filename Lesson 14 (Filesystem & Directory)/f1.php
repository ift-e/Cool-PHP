<?php
// read the directory in different two way

$entries = scandir(getcwd());
foreach ($entries as $entrie) {
    if ("." != $entrie && ".." != $entrie) {
        if (is_dir($entrie)) {
            echo "[d] {$entrie}\n";
        } else {
            echo "[f] {$entrie}\n";
        }
    }
}

function countDir($dir){
    $count = 0;
    $entries = scandir($dir);
    foreach ($entries as $entrie) {
        if ("." != $entrie && ".." != $entrie) {
            if (is_dir($entrie)) {
                $count++;
            }
        }
    }
    return $count;
}

echo countDir(getcwd());



// Another Way to Read File
$entries = opendir(getcwd());

while (false !== $entry = readdir($entries)) {
    echo $entry . "\n";
}