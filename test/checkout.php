<?php
  session_start();
  if ( ! isset($_SESSION["basket"]) )
  {
    $basket = array();
    $_SESSION["basket"] = $basket;
  }
 
  $basket = $_SESSION["basket"];
 
  
  // Get each item from the basket and accumulate the total cost
  $total = 0;
  foreach ($basket as $item)
  {
    $qty = $item["qty"];
    $price = $item["price"];
    $cost = $qty * $price;
    $total = $total + $cost;
  }

 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
<head>
<title>finish</title>
<meta name="generator" content="textpad 4.6">
<meta name="author" content="ray gumme">
</head>

<body>
<h1 align="center">Checkout</h1>
<a href="displayfruit.php">Continue shopping</a>

<p>Total amount due: <?php echo $total; ?>
<h2>Please enter payment method...</h2>

<form action="finish.php">
<p> Need to get the card type and number </p>
<p><input type="submit" value="Finish" /></p>
</form>

</body>
</html>
