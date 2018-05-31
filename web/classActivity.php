<?php 
require("dbConnect.php");

$db = get_db();

if(!isset($db)) {
    die("Db connection was not set");
}

$query = "SELECT id, name, number FROM course";

$statement = $db->prepare($query);

//bind any variables needed here...

$statement->execute();
$courses->$statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!<!DOCTYPE html>
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
    <h1>Courses</h1>

    <ul> 

    <?php 
    var_dump($courses);
    ?>
        <li><p>Course 1<p></li>
        <li><p>Course 2<p></li>
        <li><p>Course 3<p></li>
        <li><p>Course 4<p></li>
    </ul>
</body>
</html>