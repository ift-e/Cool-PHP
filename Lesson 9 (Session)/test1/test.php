<?php
session_name('ourapp');
session_start([
    'cookie_lifetime' => 60,
    'cookie_domain' => '.st.com', // Main domain name
    'cookie_path' => '/',
]);
echo $_SESSION['name'];

$_SESSION['age'] = 18;

echo $_SESSION['age'];