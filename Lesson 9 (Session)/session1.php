<?php
// session_name('myapp');
session_start([
    'cookie_lifetime' => 60
]);

// $_SESSION['name'] =  "Ifte";

echo $_SESSION['name'];

