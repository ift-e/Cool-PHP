<?php
    header('X-XSS-Protection:0'); 
    include_once "form2-function.php";
    $fruits =  ['apple', 'mango', 'Banana', 'lemon'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Form</title>
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
                <h2>Select / Dropdowns</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi accusantium est odio possimus sed iusto id distinctio cumque obcaecati blanditiis.</p>
                <p>
                    <?php
                        // $sFruits = $_POST['fruits'] ?? array();
                        $sFruits = filter_input(INPUT_POST, 'fruits', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY) ?? array();
                        if(count($sFruits) > 0){
                            // printf("You Have Selected: %s", ucwords(filter_input(INPUT_POST, 'fruits', FILTER_SANITIZE_STRING)));
                            echo "You Have Selected: ". join(', ', $sFruits);
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form action="" method="POST">
                    <label for="fruits">Select Some Fruits</label>
                    <select style="height: 200px;" name="fruits[]" id="fruits" multiple>
                        <option disabled selected>--Select Fruit--</option>
                        <?php displayOptions($fruits, $sFruits) ?>
                    </select>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>