<?php  
session_start();
require("dbConnect.php");
require("productDef.php");

$productId = htmlspecialchars($_GET["productId"]);

$db = get_db();

$query = "SELECT product_id, title, description as descr, dimensions, price, image FROM product where product_id=:taft";

$statement = $db->prepare($query);
$statement->bindValue(":taft", $productId, PDO::PARAM_INT);

$statement->execute();
$product = $statement->fetch();

// $detail = new myProductDetail();
// $detail->productId = $productId;
$item = new myProductDetail();
$item->productId = $productId;

$productList = $_SESSION["productList"];
if (!isset($productList)) {
    $productList = array();
}
$found = false;
for($k = 0; $k < count($productList); $k++) {
    $item = $productList[$k];
    if($item->$productId == $productId) {
        $item->$quantity++;
        $found = true;
        break;
    }
}
if ($found == false) {
    $item = new myProductDetail();
    $item->productId = $productId;
    $item->$quantity = 1;
    $productList[] = $item;
}
$_SESSION["productList"] = $productList;


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
    <h1> <?php var_dump($productList); ?> </h1>
</body>
</html>