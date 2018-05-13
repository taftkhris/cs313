<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
    
    <?php echo $_POST["nova"]; ?><br>
    <?php echo $_POST["chevy"]; ?><br>

<?php
    if(array_key_exists('gtx', $_POST)) 
        echo "found gtx key";
    if(array_key_exists('nova', $_POST)) 
        echo "found nova key";
    if(array_key_exists('chevy', $_POST)) 
        echo "found chevy key";
?>
    
    <?php 
        function setVariableGtx(){
            $_SESSION["carGtx"] = $_POST["gtx"];
        }
        function setVariableNova(){
            $_SESSION["carNova"] = $_POST["nova"];
        }
        function setVariableChevy() {
            $_SESSION["carChevy"]= $_POST["chevy"];
        }
    if(array_key_exists('gtx', $_POST)) {
    setVariableGtx();
    }
    elseif(array_key_exists('nova', $_POST)) {
        setVariableNova();
    }
    elseif(array_key_exists('chevy', $_POST)) {
        setVariableChevy();
    }
    print_r($_SESSION);
?>
    
</body>
</html>