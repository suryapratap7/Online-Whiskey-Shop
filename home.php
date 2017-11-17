<?php session_start()



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"


<html>
<head>
<title>Whisky Shop</title>
<meta name="keywords" content="KEYWORDS" />
<meta name="description" content="DESCRIPTION" />
<meta name="copyright" content="Tiram &copy; 2005" />
<link rel="stylesheet" href="style.css" type="text/css" media="all" title="Default styles" />

<?php include ("validation.php");

  $search = "";
  $name = "";
  $error = "";

$link =  mysql_connect('localhost', '21116053', '21116053');
       if ( ! $link ) die("Surya: Cannot connect to mySQL");

$selectedOk = mysql_select_db('21116053');
        if ( ! $selectedOk  ) die("Surya:  Cannot select database ");

 if (isset($_REQUEST["btnSearch"]))
 {
 $search = $_REQUEST["txtName"];
 $query = "SELECT * FROM scotchWhisky WHERE name = \"$search\"   " ;
 $resultSet = mysql_query ($query);
 $row = mysql_fetch_row($resultSet);
 $name = $row[1];


  if ( $search =! $name)    $error = "There is no such whisky available";
  else
  {
    header("location: search.php?txtName=".$name);
  }
 }

 if (isset($_REQUEST["basket.php"]))
 {
  $whiskies = $_SESSION["whiskies"];
                         if (!$whiskies){
                         $error = "Your basket is empty";
                          }
                         else
                         {
                            header("location: basket.php");
                         }
  }

?>



</head>
<body>

<div id="container">
	<div id="header">
	     <h1>Whisky Shop</h1>
	     <ul>
	     <li> <a href= "basket.php" > Basket</a></li>
	     <li> <a href= "checkout.html"> Ckeckout</a></li>
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
<li><a href="sample.php">Samples</a></li>

<li><a href="aboutWhisky.html"> About Whisky </a></li>


</ul>

</div>

<div id= "content">

<form action="">
<p>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
   Whisky Name: <input name= "txtName" type="text" value="" />&nbsp &nbsp<input name= "btnSearch" type="submit" value="search" /></p>
<b><?php
  echo $error; ?></b>
</form>

<p align ="center"><img src="shop.jpg" width="800" height="300"  alt="pic of whisky shop" />
</p>
<hr>

<p> Whisky shop is dolor sit amet, consectetur adipiscing elit.
Cras sit amet justo urna. Vivamus sit amet urna erat, eget accumsan felis.
Aenean imperdiet ultricies aliquam. Aliquam erat volutpat. Maecenas tempus egestas malesuada.
Etiam congue, quam sit amet fringilla lacinia, quam nulla lobortis diam, eget tempus enim sem
vitae dolor. Phasellus vehicula vulputate imperdiet. Aenean turpis nisl, porta in egestas sed,
congue et erat. Donec posuere tempus leo, non tincidunt arcu pharetra a. Nunc ut lacus metus,
sed facilisis purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
ridiculus mus. Pellentesque at quam eros.</p>

</div>



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