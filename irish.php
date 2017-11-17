<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

<html>
<head>
<title>Scotch Whisky</title>
<LINK HREF="rowSelector.css" REL="STYLESHEET">
<link rel="stylesheet" href="style.css" type="text/css" media="all" title="Default styles" />

</head>
<body onload='setupRowSelector("tabItems");'>


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
<li><a href="worldWhisky.html">World Whisky</a>

    <ul>
        <li><a href="american.php">American</a></li>
        <li><a href="irish.php">Irish</a></li>
        <li><a href="scottish.php">Scottish</a></li>
    </ul>

</li>
<li><a href="sample.php">Samples</a></li>

<li><a href="aboutWhisky.html"> About Whisky </a></li>


</ul>
</div>
<br>
<br>

<?php

  //  establish a connection to the server
  $connection = mysql_connect("localhost", "21116053", "21116053");
  if ( ! $connection ) die("Surya: Cannot connect to server");


  //  select the database
  $database = mysql_select_db("21116053");
  if ( ! $database ) die("Surya: Cannot connect to database");


  //  set up an SQL query to display all the data
  $query = "SELECT * FROM scotchWhisky WHERE country = \"Irish\" ";

  //  execute the query, save results in the resultSet
  $resultSet = mysql_query($query);
  if ( ! $resultSet ) die("Surya: Cannot execute query");
  echo "<p>   </p>\n";

?>



<table class = "hovertable" ID="tabItems" border="1" width="50%" align="center">
<tr><th>&nbsp</th><th>Irish Whiskies</th> <th>&nbsp</th></tr>

<?php

  // fetch the first row
  $row = mysql_fetch_row($resultSet);

  //  all the while we have a row...
  while ( $row != null )
  {
    // Get each element from the row
    $id = $row[0];
    $name = $row[1];
    $size =$row[2];
    $age =$row[3];
    $price =$row[4];
    $image = $row[5];



    //  display another table row on the web page
    echo "<tr> <td> <img src='$image' width='100' height='100' /></td> <td ><b>$name Whisky</b><p> <ul><li>Product Id is $id</li> <li> Size is $size</li> <li>Age is $age</li></ul> </td>  <td align = \"center\"><b>&pound $price</b> <p><FORM METHOD=\"post\" ACTION=\"search.php\" ID=\"frmItem\" NAME=\"frmItem\"> <P><INPUT TYPE=\"HIDDEN\" NAME=\"txtId\" value= '$id'></P> <P><INPUT TYPE=\"HIDDEN\" NAME=\"txtName\" value= '$name'></P> <P><INPUT TYPE=\"HIDDEN\" NAME=\"txtSize\" value= '$size'></P> <P><INPUT TYPE=\"HIDDEN\" NAME=\"txtAge\" value= '$age'></P> <P><INPUT TYPE=\"HIDDEN\" NAME=\"txtPrice\" value= '$price'></P><P><INPUT TYPE=\"HIDDEN\" NAME=\"txtImage\" value= '$image'></P> <P><INPUT TYPE=\"SUBMIT\" NAME=\"btnSubmit\" VALUE=\"More info\"></P></FORM></p></td></tr>";

    //  and try to fetch another row...
    $row = mysql_fetch_row($resultSet);
  }


?>

</table>




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


</body>
</html>