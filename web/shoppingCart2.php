<?php
echo "<head> 
<link rel='stylesheet' href='shoppingCart.css'>
</head>"; 
echo 
"<form action='cartPage.php' method='post'>
<div class='row'> 
    <div class='column' style='background-color:#aaa;'>
    <img class='pictures' src='gtx.jpg' alt='redGtx'>
    <h2 class='carType'>67' GTX</h2>
    <h3 class='price'>Price: $300</h3>
    <button type='submit' class='submitButton' name='gtx' value='{\"type\":\"gtx\",\"price\":\"300\"}'>Add to Cart</button>
  </div>
  <div class='column' style='background-color:#bbb;'>
  <img class='pictures' src='nova.jpg' alt='redNova'>
    <h2 class='carType'>67' Nova</h2>
    <h3 class='price'>Price: $500</h3>
    <button type='submit' class='submitButton' name='nova' value='{\"type\":\"nova\",\"price\":\"500\"}'>Add to Cart</button>
  </div>
  <div class='column' style='background-color:#ccc;'>
  <img class='pictures' src='nomad.jpg' alt='chevyNomad'>
    <h2 class='carType'>56' Chevy</h2>
    <h3 class='price'>Price: $400</h3>
    <button type='submit' class='submitButton' name='chevy' value='{\"type\":\"Chevy\",\"price\":\"400\"}'>Add to Cart</button>
  </div>
  <div>
    <a href='cartPage.php'>View Cart</a>
  </div>
</div>
</form>";
?>