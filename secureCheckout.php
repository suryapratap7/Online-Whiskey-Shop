<?php
  session_start();
  if ( ! isset($_SESSION['user']) ) header("Location: 403.htm");


  if ( ! isset($_SESSION["whiskies"]) )
  {
    $whiskies = array();
    $_SESSION["whiskies"] = $whiskies;
  }

  $whiskies = $_SESSION["whiskies"];


  // Get each item from the basket and accumulate the total cost
  $total = 0;
  foreach ($whiskies as $whisky)
  {

	  $price = $whisky["price"];
	  $qty = $whisky["qty"];
	  $cost = $qty * $price;
  $total = $total + $cost;
  }

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"


<html>
<head>
<title>Whisky Shop</title>
<meta name="keywords" content="KEYWORDS" />
<meta name="description" content="DESCRIPTION" />
<meta name="copyright" content="Tiram &copy; 2005" />
<link rel="stylesheet" href="style.css" type="text/css" media="all" title="Default styles" />
</head>
<body>

<div id="container">
	<div id="header">
	     <h1>Whisky Shop</h1>
	     <ul>
	     <li> <a href= "basket.php" > Basket</a></li>
	     <li> <a href= "checkout.php"> Ckeckout</a></li>
	     <li> <a href= "delivery.html"> Delivery Info</a></li>
	     </ul>
    </div>

<div id="navigation">


<ul>

<li><a href="home.php">Home</a></li>
<li><a href="ScotchWhisky.php">Scotch Whisky</a></li>
<li><a href="">World Whisky</a>

    <ul>
        <li><a href="american.php">American</a></li>
        <li><a href="irish.php">Irish</a></li>
        <li><a href="scottish.php">Scottish</a></li>
    </ul>

</li>
<li><a href="sample.html">Samples</a></li>

<li><a href="aboutWhisky.html"> About Whisky </a></li>


</ul>

</div>


<?php


    $user = $_SESSION['user'];

    $userRow = explode(":", $user);

    $id = $userRow[0];
    $firstName = $userRow[1];
    $lastName = $userRow[2];
    $contactNumber = $userRow[4];
    $emailId = $userRow[5];
    $address = $userRow[6];
    $name = $firstName . ' ' . $lastName;


?>

<H2>Welcome <?php echo $name; ?> to a Secure and Quick Checkout</H2>

<form name="Payform" action="finish.php" onSubmit="return checkForm()"
method="post">

<table class = "hovertable" width = 50% align = "center" border = "10">

<tr><th>Order total</th><th> &nbsp </th></tr>
<tr><td align = "right"> SubTotal: </td><td><?php echo "&pound$total" ; ?></td></tr>
<tr><td align = "right"> Delivery Charges:</td><td> &pound0.00 </td></tr>
<tr><td align = "right"> <b>GrandTotal: </b></td><td><?php echo "<b> &pound$total.00 </b>" ; ?></td></tr>

<tr><th>Billing Address</th> <th> &nbsp </th></tr>
<tr><td align = "right"> First Name:</td><td><?php echo $firstName; ?> </td></tr>
<tr><td align = "right"> Last Name:</td><td> <?php echo $lastName; ?></td></tr>
<tr><td align = "right"> Contact Number: </td><td><?php echo $contactNumber; ?></td></tr>
<tr><td align = "right"> Email Id: </td><td><?php echo $emailId; ?></td></tr>
<tr><td align = "right">Address:</td><td> <?php echo $address; ?></td></tr>

<tr><th>Payment details</th> <th> &nbsp </th></tr>
<tr><td align = "right">Pay by:</td><td> <SELECT name="Type of cards">
<OPTION selected value="1"> Visa </OPTION>
<OPTION value="2"> Master Cared</OPTION>
<OPTION value="3"> American Express</OPTION>
<OPTION value="4"> Partnership card </OPTION>
</SELECT></td></tr>
<tr><td align = "right">Card Number: </td><td><input type="text" name="cardNum" size="20"></td></tr>
<tr><td align = "right"> Start date: </td><td><SELECT name="sdMonth">
<option value="00">MM</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>

	</select>

<SELECT name="sdYear">
<option value="0">YYYY</option>
		<option value="2003">2003</option>
		<option value="2004">2004</option>
		<option value="2005">2005</option>
		<option value="2006">2006</option>
		<option value="2007">2007</option>
		<option value="2008">2008</option>
		<option value="2009">2009</option>
		<option value="2010">2010</option>
		<option value="2011">2011</option>
		<option value="2012">2012</option>

	</select></td></tr>

<tr><td align = "right">Expiry Date: </td><td><SELECT name="edMonth">
<option value="00">MM</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>

	</select>

<SELECT name="edYear">
<option value="0">YYYY</option>
		<option value="2012">2012</option>
		<option value="2013">2013</option>
		<option value="2014">2014</option>
		<option value="2015">2015</option>
		<option value="2016">2016</option>
		<option value="2017">2017</option>
		<option value="2018">2018</option>

	</select></td></tr>

<tr><td align = "right"> Name on card: </td><td><input type="text" name="nameCard" size="20"></td></tr>



<tr><th>&nbsp</th><th> <input type = submit name = "pay" value =" Pay " onclick= "return btnSubmitClick();"></th></tr>

</table>
</form>




<div id="footer">

<ul>
<li><a href="about.html">About Us </a> </li>
<li><a href = "contact.html"> Contact us </a></li>
<li><a href = "site.html" > Site map </a> </li>

</ul>
</div>
</div>


</body>
</html>