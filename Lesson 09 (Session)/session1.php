<?php
session_name('ourapp');
session_start([
    'cookie_lifetime' => 60,
    'cookie_domain' => '.st.com', // Main domain name
    'cookie_path' => '/',
]);

$_SESSION['name'] =  "Ifte Hossain </br>";

echo $_SESSION['name'] ;

echo $_SESSION['age'];
