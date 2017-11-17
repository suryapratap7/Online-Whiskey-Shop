<?php
  session_start();
  
  // check if the basket has been defined
  if ( ! isset($_SESSION["basket"]) )
  {
    // it hasn't so define it and declare it to be a SESSION variable
    $basket = array();
    $_SESSION["basket"] = $basket;
  }
  
  // copy the session array to the basket for simplicity
  $basket = $_SESSION["basket"];
 
  // check if we got here from the showItem page
  // Note that btnSubmit was not sent, so we sent hidSubmit instead
  if ( isset($_REQUEST["hidSubmit"]) )
  {
    // we did, so get each of the parameters...
    $id = $_REQUEST["hidId"];
    $name = $_REQUEST["hidName"];
    $price = $_REQUEST["hidPrice"];
    $qty = $_REQUEST["txtQty"];
    
    //  and save them in an associative array
    $item = array("id"=>$id, "name"=>$name, "price"=>$price, "qty"=>$qty);
    
    // add the item to the basket
    $basket[] = $item;
    
    //  finally update the session array
    $_SESSION["basket"] = $basket;
  }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Basket</title>
<meta name="keywords" content="KEYWORDS" />
<meta name="description" content="DESCRIPTION" />
<meta name="copyright" content="Tiram &copy; 2005" />
<link rel="stylesheet" href="default.css" type="text/css" media="all" title="Default styles" />

</head>
<body>
<h1>Your basket</h1>

<p>
<a href="displayFruit.php">Continue Shopping</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="checkout.php">Checkout</a>
</p>

<h2>Your basket contains...</h2>

<?php
  //  initialise the total to zero
  $total = 0;
  
  // get each item from the basket
  foreach ( $basket as $item )
  {
    $id = $item["id"];
    $name = $item["name"];
    $price = $item["price"];
    $qty = $item["qty"];
    
    // calculate the cost and accumulate the total
    $cost = $qty * $price;
    $total = $total + $cost;
    
    //  display the data on the web page
    echo "<p>ID is $id NAME is $name PRICE is $price QTY is $qty COST is $cost</p>\n";
  }
  
  // finally display the total
  echo "<p><b>TOTAL=$total</b></p>\n";
?>

</body>
</html>