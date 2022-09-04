<?php
    include_once "scramblerf.php";
    $task = $_GET['task'] ?? 'encode';    
    $key = 'abcdefghijklmnopqrstuvwxyz1234567890';

    if('key' == $task){
        $key_orginal = str_split($key);
        shuffle($key_orginal);
        $key = join('',$key_orginal);
    }
    elseif (isset($_REQUEST['key']) && !empty($_REQUEST['key'])) {
        $key = $_REQUEST['key'];
    }

    $scramblerData = "";
    if('encode' == $task){
        $data = $_POST['data'] ?? '';
        if(!empty($_POST['data'])){
            $scramblerData = scramblerData($data, $key);
        }
    }

    if('decode' == $task){
        $data = $_POST['data'] ?? '';
        if(!empty($_POST['data'])){
            $scramblerData = decodeData($data, $key);
        }
    }


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
        #data, #result{
            width: 100%;
            height: 160px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>Data Scrambler</h1>
                <p>Use this application to scramble your data.</p>
                <p>
                    <a href="/scrambler.php?task=encode">Encode</a> | 
                    <a href="/scrambler.php?task=decode&key=<?php echo $key ?>">Decode</a> | 
                    <a href="/scrambler.php?task=key">Generate Key</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form action="scrambler.php<?php if('decode' == $task){ echo "?task=decode&key=$key";} ?>" method="POST">
                    <label for="key">Key</label>
                    <input type="text" id="key" name="key" <?php displayKey($key) ?> >

                    <label for="data">Data</label>
                    <textarea name="data" id="data" cols="30" rows="50"><?php echo $_POST['data'] ?? '' ?></textarea>

                    <label for="result">Result</label>
                    <textarea name="result" id="result" cols="30" rows="50"><?php echo $scramblerData; ?></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>