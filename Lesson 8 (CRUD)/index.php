<?php
require_once "inc/functions.php";
$info = '';
$task = $_GET['task'] ?? 'report';
$error = $_GET['error'] ?? 0;
if ('seed' == $task) {
    seed();
    $info = "Sedding is complete";
}
$fname = '';
$lname = '';
$roll = '';
if (isset($_POST['submit'])) {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $roll = filter_input(INPUT_POST, 'roll', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($fname) && !empty($lname) && !empty($roll)) {
        $result = addStudent($fname, $lname, $roll);
        if ($result) {
            header('location: index.php?task=report');
        }else{
            $error = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body {
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>CRUD Project</h2>
                <p>A simple project to perfom CRUD operations using plain files and PHP</p>
                <?php include_once('inc/templates/nav.php') ?>
                <hr />
                <?php
                if (!empty($info)) {
                    echo "<p>{$info}</p>";
                }
                ?>
            </div>
        </div>
        <?php
        if (1 == $error) : ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <blockquote>
                        Duplicate Roll Number
                    </blockquote>
                </div>
            </div>
        <?php endif; ?>
        <?php
        if ('report' == $task) : ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <?php generateReport(); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
        if ('add' == $task) : ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <form action="index.php?task=add" method="POST">
                        <label for="fname">First name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $fname?>">
                        <label for="lname">Last name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $lname?>">
                        <label for="roll">Roll</label>
                        <input type="number" id="roll" name="roll" value="<?php echo $roll?>">
                        <button type="submit" class="button-primary" name="submit">Save</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>



</body>

</html>