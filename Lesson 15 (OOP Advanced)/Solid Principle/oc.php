<?php
// It's just code to understand the concept
// Open Closed principle

// wrong way
/*
class FileDisplay
{
    function display($file, $fileType)
    {
        if ('mp4' == $fileType) {
            // display video
        } elseif ('mp3' == $fileType) {
            // display auidio player
        } elseif('jpg' == $fileType){
            // display jpg image
        }else {
            // display text file
        }
    }
}
*/


// right way
interface FileInterface
{
    function display();
}


class FileDisplay
{
    function display(FileInterface $file)
    {
        $file->display();
    }
}


class ImageFile implements FileInterface{
    function display(){
        // take necessary steps to display image
    }
}

class VideoFile implements FileInterface{
    function display(){
        // take necessary steps to display Video
    }
}

$image = new ImageFile("abcd.jpg");
$video = new VideoFile("abcd.mp4");
$fd = new FileDisplay();
$fd->display($image);
$fd->display($video);