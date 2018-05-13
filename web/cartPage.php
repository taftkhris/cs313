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
    
    <?php 
    foreach ($_POST[""] as $values)
        echo("$values<br>");
    ?>
    <?php echo $_POST["gtx"]; ?><br>
    <?php echo $_POST["nova"]; ?><br>
    <?php echo $_POST["chevy"]; ?><br>
    
</body>
</html>