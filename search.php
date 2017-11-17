<?php   session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"


<html>
<head>
<title>Search</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all" title="Default styles" />

</head>

<script type="text/javascript" src="validation.js"></script>
<script type="text/javascript">
function btnSubmitClick()
{
  // get the form
  var frmItem = document.getElementById("frmItem");

  // get the txtQty value from the form...
  var txtQty = frmItem.txtQty.value;

  // and validate it.  Submit the form if all is ok
  if ( isEmpty(txtQty) )
    alert("Please enter a qty");
  else if ( ! isInteger(txtQty) )
    alert("Invalid qty");
  else if ( toInteger(txtQty) < 1 )
    alert("Please enter a qty greater than zero");
  else
    frmItem.submit();

}

</script>

<body>

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
</br></br>
<div id= "content">
<?php
$link =  mysql_connect('localhost', '21116053', '21116053');
       if ( ! $link ) die("Surya: Cannot connect to mySQL");

$selectedOk = mysql_select_db('21116053');
        if ( ! $selectedOk  ) die("Surya:  Cannot select database ");

 if (isset($_REQUEST["btnSubmit"]))
    {
     $search = $_REQUEST["txtId"];
     $query = "SELECT * FROM scotchWhisky WHERE id = \"$search\"   " ;
    }

 if (isset($_REQUEST["txtName"]))
     {
       $search = $_REQUEST["txtName"];

       $query = "SELECT * FROM scotchWhisky WHERE name = \"$search\"   " ;
     }

  else
  {
  }


 $resultSet = mysql_query ($query);


$row = mysql_fetch_row($resultSet);
$id = $row[0];
$name = $row[1];
$size = $row[2];
$age = $row[3];
$price = $row[4];
$image = $row[5];
$description = $row[6];


?>

<div id="boxmodel" >

<h2 align = 'center'> <?php echo "$name" ?> Whisky</h2>
<br>

<img align = 'right' src="<?php echo "$image" ?> " width="400" height="300" alt="image" />
<b><table width="40%">
<caption></caption>
<tbody>
  <tr>
    <td>Id</td>
    <td><?php echo "$id" ?></td>
  </tr>

  <tr>
     <td>Name</td>
     <td><?php echo "$name" ?></td>
  </tr>

  <tr>
      <td>Size</td>
      <td><?php echo "$size" ?></td>
  </tr>

  <tr>
      <td>Age</td>
      <td><?php echo "$age" ?></td>
  </tr>

  <tr>
      <td>Price</td>
      <td>&pound<?php echo "$price" ?></td>
  </tr>

</tbody>
</table></b>
<br>

<p><?php echo "$description \n" ?></p>
<br>

<FORM  id="frmItem" ACTION="basket.php" >
	<P><INPUT TYPE="HIDDEN" NAME="txtId"value="<?php echo $id; ?>"></P>
	<P><INPUT TYPE="HIDDEN" NAME="txtName" value="<?php echo $name; ?>"</P>
	<P><INPUT TYPE="HIDDEN" NAME="txtSize" value="<?php echo $size; ?>"></P>
    <P><INPUT TYPE="HIDDEN" NAME="txtAge" value="<?php echo $age; ?>"></P>
	<P><INPUT TYPE="HIDDEN" NAME="txtPrice" value="<?php echo $price; ?>"></P>
	<P>Quantity <input type="text" name="txtQty" value="" /></P>
	<P><INPUT TYPE="button" NAME="btnSubmit" VALUE="Submit" onclick="btnSubmitClick()"></P>

	<input type="hidden" name="hidSubmit" value="Submit"/>
</FORM>

</div>
</div>
<p>&nbsp &nbsp </p>
<br>





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