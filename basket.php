<?php   session_start();

  if (isset ($_REQUEST["btnClear"]))
   {
       unset($_SESSION["whiskies"]);
   }
 if ( ! isset($_SESSION["whiskies"]) )
  {
     $whiskies = array();
     $_SESSION["whiskies"] = $whiskies;

  }


  $whiskies = $_SESSION["whiskies"];
  if ( isset($_REQUEST["hidSubmit"]) )
  {
    $id = $_REQUEST["txtId"];
    $name = $_REQUEST["txtName"];
    $size = $_REQUEST["txtSize"];
    $age = $_REQUEST["txtAge"];
    $price = $_REQUEST["txtPrice"];
    $qty = $_REQUEST["txtQty"];

    $whisky = array("id"=>$id, "name"=>$name, "size"=>$size, "age"=> $age, "price"=>$price, "qty"=> $qty);

	$whiskies[] = $whisky;


    $_SESSION["whiskies"] = $whiskies;
  }



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

<html >
<head>
<title>Basket</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all" title="Default styles" />
<LINK HREF="rowSelector.css" REL="STYLESHEET">
<LINK HREF="../notes.css" REL="STYLESHEET">
<SCRIPT LANGUAGE="JavaScript" SRC="rowSelector.js"></SCRIPT>
</head>
<body ONLOAD='setupRowSelector("tabItems");'>

<div id="container">
	<div id="header">
	     <h1>Whisky Shop</h1>
	     <ul>
	     <li> <a href= "basket.php"> Basket</a></li>
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



<div id= "content">
<h2 align ="center">Your basket</h2>


<?php

$total= 0;


$nWhiskies = count($whiskies);
echo "<h3 ALIGN=\"center\">Your basket contains $nWhiskies different whisky.</h3>";

echo "<TABLE class = \"hovertable\" ALIGN=\"center\" BORDER=1.5 CELLSPACING=0 CELLPADDING=0 WIDTH=\"50%\">";
echo "<TR ALIGN=\"left\" VALIGN=\"middle\"> <TH>Id</TH> <TH>Name</TH> <TH>Size</TH> <TH>Age</TH> <TH>Price</TH> <TH>Quantity</TH> <TH> Total Cost</TH></TR>";


foreach ($whiskies as $whisky)
{

  $id = $whisky["id"];
  $name = $whisky["name"];
  $size = $whisky["size"];
  $age = $whisky["age"];
  $price = $whisky["price"];
  $qty = $whisky["qty"];
  $cost = $qty * $price;
  $total = $total + $cost;

  echo "<tr> <td> $id </td> <td> $name </td> <td> $size </td> <td> $age </td> <td> &pound$price.00 </td> <td> $qty </td> <td> &pound$cost.00 </td> </tr>";
}

echo "<tr><td>&nbsp</td> <td>&nbsp</td> <td>&nbsp</td> <td>&nbsp</td> <td>&nbsp</td> <td><b>Grand Total</b></td> <td><b> &pound$total.00 </b></td></tr> </TABLE>";
echo "<form><br><table align = \"center\"><tr><td>  <INPUT TYPE=\"submit\" NAME=\"btnClear\" VALUE=\"Clear\" ></td> ";
echo" <td><a href=\"ScotchWhisky.php\"> <INPUT TYPE=\"button\" NAME=\"btnContinue\" VALUE=\"Continue Shopping \" ></a></td> ";
echo" <td><a href=\"logOn.php\"> <INPUT TYPE=\"button\" NAME=\"btnproceed\" VALUE=\"Proceed \" ></a> </td></tr></table> </form> ";


?>
</div>




<br><br>
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