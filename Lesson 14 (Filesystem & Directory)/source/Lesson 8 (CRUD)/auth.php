<?php
session_start([
    'cookie_lifetime' => 300,
]);
require_once "inc/functions.php";

if (isset($_REQUEST['logout'])) {
    $_SESSION['loggedin'] = false;
    $_SESSION['user'] = false;
    // $_SESSION['role'] = false;
    session_destroy();
    header('location: index.php');
}

if (hasPrivilege()) {
    header('location: index.php');
    return;
}

$error = false;

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$fp = fopen("c:\\xampp\\htdocs\\Hasin PHP\\Lesson 8 (CRUD)\\data\\user.txt", "r");

if ($username && $password) {
    $_SESSION['loggedin'] = false;
    $_SESSION['user'] = false;
    $_SESSION['role'] = false;
    while ($data = fgetcsv($fp)) {
        if ( $data[0] == $username && $data[1] == sha1($password) ) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $data[2];
            header('location: index.php');
        }
    }
    if (!$_SESSION['loggedin']) {
        $error = true;
    }
}else {
    $_SESSION['loggedin'] = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body {
            margin-top: 30px;
            /* background-color: #F4F5F6; */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>Simple Auth Example</h2>
                <p>
                    <?php
                    if (isset($_SESSION['loggedin']) && true == $_SESSION['loggedin']) {
                        echo "Hello Admin! Welcome";
                    } else {

                        echo "Hello Stranger, Login Below";
                        echo "<p>Username (admin): admin. &nbsp;&nbsp; Password: rabbit <br> Username (editor): peter. &nbsp;&nbsp; Password: panther</p>";
                    }
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <?php
                    if($error){
                        echo "<blockquote>Username and Password didn't match</blockquote>";
                    }
                ?>
                <?php
                if (false == $_SESSION['loggedin']) :
                ?>
                    <form method="POST">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <button type="submit" class="button-primary" name="submit">Log In</button>
                    </form>
                <?php
                else :
                ?>
                    <form action="auth.php" method="POST">
                        <input type="hidden" name="logout" value="1">
                        <button type="submit" class="button-primary" name="submit">Log Out</button>
                    </form>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>

</body>

</html>