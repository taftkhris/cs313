<?php 
require("dbConnect.php");
$courseId = htmlspecialchars($_GET["course_id"]);

$db = get_db();

$qeury = "SELECT name, number FROM course WHERE id";
$statement = $db->prepare($query);

$statement->bindValue(":id", $courseId, PDO::PARAM_INT);
$statement->execute();

$row = $statement->fetch();

$number = $row['number'];
$name = $row['name'];
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
    <?php 
    echo "<h1>Showing notes for: $number - $name</h1>";
    ?>

    <form action"insertNote.php" method="POST">
    <input type="hidden" name="course_id" value="<?php echo $courseId; ?>">
    <input type="date" name="date"><br>
    <textarea name="content" placeholder="content"> </textarea>
    </form>
</body>
</html>