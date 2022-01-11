<?php
    header('X-XSS-Protection:0'); 
    include_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>Our First Form</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi accusantium est odio possimus sed iusto id distinctio cumque obcaecati blanditiis.</p>
                <?php
                    $fname = "";
                    $lname = "";
                    $checked = "";
                    if(isset($_REQUEST['fname']) && !empty($_REQUEST['fname'])):
                        // $fname = htmlspecialchars($_REQUEST['fname']);
                        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
                    endif;
                    if(isset($_REQUEST['lname']) && !empty($_REQUEST['lname'])):
                        // $lname = htmlspecialchars($_REQUEST['lname']);
                        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
                    endif;
                    if(isset($_REQUEST['cb1']) && $_REQUEST['cb1'] == 1){
                        $checked = " checked";
                    }
                ?>
                <h5>First Name: <?php echo $fname; ?></h5>
                <h5>Last Name: <?php echo $lname;?></h5>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form action="" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="<?php echo $fname?>">

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="<?php echo $lname?>">

                    <div>
                        <input type="checkbox" name="cb1" id="cb1" value="1" <?php echo $checked ?>>
                        <label for="cb1" class="label-inline">Checkbox</label>
                    </div>

                    <label class="label">Select Some Fruits</label>

                    <input type="checkbox" name="fruits[]" id="cb2" value="mango" <?php isFruitsChecked("mango")?> >
                    <label for="cb2" class="label-inline">mango</label> <br/>
                    <input type="checkbox" name="fruits[]" id="cb3" value="orange" <?php isFruitsChecked("orange")?> >
                    <label for="cb3" class="label-inline">orange</label> <br/>
                    <input type="checkbox" name="fruits[]" id="cb4" value="banana" <?php isFruitsChecked("banana")?> >
                    <label for="cb4" class="label-inline">banana</label> <br/>
                    <input type="checkbox" name="fruits[]" id="cb5" value="lemon" <?php isFruitsChecked("lemon")?> >
                    <label for="cb5" class="label-inline">lemon</label> <br/>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>