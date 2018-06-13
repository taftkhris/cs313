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




echo "The items product id is: " . $_SERVER["REQUEST_METHOD"] . "<br>";
 


$productList = unserialize($_SESSION["productList"]);
var_dump($productList); 
if (!isset($productList)) {
    $productList = array();
}
$found = false;
for($k = 0; $k < count($productList); $k++) {
    $item = $productList[$k];
    echo "We're in the loop<br>";
    echo "The items product id is: $item->productId<br>";
    echo "The items product id is: $productId<br>";
    if($item->productId == $productId) {
        echo "found a match";
        $item->quantity++;
        $found = true;
        break;
    }
}
if ($found == false) {
    $item = new myProductDetail();
    $item->productId = $productId;
    $item->quantity = 1;
    $productList[] = $item;
}
$_SESSION["productList"] = serialize($productList);


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