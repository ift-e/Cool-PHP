<?php
    header('X-XSS-Protection:0');
    $allowedTypes = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    ];
    if(isset($_FILES['photo'])){
        if (in_array($_FILES['photo']['type'],$allowedTypes) !== false && $_FILES['photo']['size'] < 5*1024*1024) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "files/".$_FILES['photo']['name']);
        }
    }
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
                <h2>Photo Upload</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi accusantium est odio possimus sed iusto id distinctio cumque obcaecati blanditiis.</p>
                <pre>
                    <?php print_r($_FILES)?>
                </pre>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form method="POST" enctype="multipart/form-data">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo"> <br/>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>