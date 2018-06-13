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
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
    <link href="mainCss.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<!-- <body>
    <h1><//?php echo var_dump($product); ?></h1>

    <a href="artCart.php?productId=<//?php echo $productId; ?>&mode=add">Add to Cart</a>
    <a href="timsArt.php">Back to Shopping</a>

</body>
</html> -->

<!DOCTYPE html>
<html>
    <body>
        <div class="container">
        	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img style="max-width:75%;" src="<?php echo "artWork/" . $product["image"];?>" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo $product["title"]; ?></h3>            
                    
                    <!-- Precios -->
                    <h6 class="title-price"><small><?php echo $product["title"] . " Art Piece"; ?></small></h6>
                    <h3 style="margin-top:0px;"><?php echo "$" . $product["price"]; ?></h3>
   
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Quantity</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <form action="artCart.php?productId=<?php echo $productId; ?>&mode=add" method="POST">
                    <div class="section" style="padding-bottom:20px;">
                        <a href="artCart.php?productId=<?php echo $productId; ?>&mode=add"><button class="btn btn-success" type="submit"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</button></a>
                    </div>
                    </form>                                        
                </div>                              
        
                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Product Details</li>
                        <li><?php echo $product["dimensions"]?></li>
                        <!-- <li>Vendedor</li>
                        <li>Envío</li> -->
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                            Description Coming Soon
                            </small>
                        </p>
                        <small>
                            <ul>
                                <!-- <li>Super AMOLED capacitive touchscreen display with 16M colors</li> -->
                            </ul>  
                        </small>
                    </div>
                </div>		
            </div>
        </div>        
    </body>
</html>