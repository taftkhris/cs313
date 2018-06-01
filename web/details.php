<?php 
session_start();
require("dbConnect.php");
$productId = htmlspecialchars($_GET["productId"]);

$db = get_db();

$query = "SELECT product_id, title, description as descr, dimensions, price, image FROM product where product_id=:taft";

$statement = $db->prepare($query);
$statement->bindValue(":taft", $productId, PDO::PARAM_INT);

$statement->execute();
$product = $statement->fetch();

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
    <h1><?php echo var_dump($product); ?></h1>
    <a href="artCart.php?productId=<?php echo $productId; ?>&mode=add">Add to Cart</a>
</body>
</html>