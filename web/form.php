<html>
    <body>
    User: <?php echo $_POST["name"]; ?><br>
    Email Address is: <a href="mailto: <?php echo $_POST["email"];?>"><?php echo $_POST["email"];?></a><br>
    Major: <?php echo $_POST["major"]; ?><br>
    Comments: <p><?php echo $_POST["comments"]; ?></p><br>
    Visited Continents: <br>
    <?php 
    foreach ($_POST["continents"] as $visted)
        echo("    $visted<br>");
        ?>
    </body>
</html>