<?php

namespace CloudStorage;

include "autoloader.php";

use \CloudStorage\Mail\Mailer;
use \CloudStorage\FileSystem\Scanner;
use \CloudStorage\FileSystem\Files\Images\Jpeg;


class Main{
    function __construct(){
        (new Mailer)->sendMail();
        (new Scanner)->Scan();

        $jpeg = new Jpeg;
        echo $jpeg->getDimension();
    }
}

new Main();