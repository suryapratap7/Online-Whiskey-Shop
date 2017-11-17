<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"


<html>
<head>
<title>Log On</title>
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

</div><br><br>

<?php
  if ( ! isset( $_REQUEST["btnLogon"] ) )
  {

    $userId    = "";
    $password  = "";
    $message   = "";
  }
  else
  {

    $userId    = trim($_REQUEST['txtUserId']);
    $password  = trim($_REQUEST['txtPassword']);

    if ($userId == "" || $password == "")
    {

      $message = "please enter login details";
    }
    else
    {

      $link =  mysql_connect("localhost", "21116053", "21116053");
      if ( ! $link ) die("Surya: Cannot connect to mySQL");


      $selectedOk = mysql_select_db("21116053");
      if ( ! $selectedOk  ) die("Surya:  Cannot select shop database");


      $encryptedPassword = crypt($password, "intercom");


      $query = "SELECT * FROM shop WHERE id='$userId' AND password='$encryptedPassword'";

      $resultSet = mysql_query($query);

      if ( ! $resultSet ) die("Surya: Cannot execute $query");

      $row = mysql_fetch_assoc($resultSet);


      if ($row == null  )
      {
        $message = "Invalid Login";
      }
      else
      {

        session_start();

        // register the name of the session variable we wish to use
        // session_register("user");

        // form a single string of the form id:firstName:lastName:password
        // this is saved in the session variable that will be 'remembered' by PHP
        $user = $row["id"] . ":" . $row["firstName"] . ":" . $row["lastName"] . ":" . $row["password"]. ":" . $row["contactNumber"]. ":" . $row["emailId"]. ":" . $row["address"];
         $_SESSION['user'] = $user;

        // the login details are correct so divert to the welcome page
        header("location: secureCheckout.php");
        exit;
      }

    }
  }
?>


<form name="frmRegister" method="post">

<TABLE class = "hovertable" ALIGN="center" BORDER=2 CELLSPACING=0 CELLPADDING=0 WIDTH="40%">


 <TR ALIGN="left" >
    <TH>Sign in to your account: </TH> <TH>&nbsp</TH>
 </TR>

 <TR ALIGN="left" >
    <TD align = "right"><b>User Name:</b></TD>
    <TD align = "left" ><input type="text" name="txtUserId"   value="<? echo $userId ?>"></TD>
</TR>

<TR ALIGN="left" >
    <TD align = "right"><b>Password:</b></TD>
    <TD align = "left"><input type="password" name="txtPassword"   value="<? echo $password ?>"><br><? echo $message ?></TD>
</TR>




<TR ALIGN="left" >
    <TD>&nbsp;</TD>
    <TD ><input type="submit" name="btnLogon" value="Continue" >
    </TD>
</TR>

<TR ALIGN="left" >
    <TH>Or Register:</TH>
    <TH>&nbsp
    </TH>
</TR>

<TR ALIGN="left" >
    <TD align = "right"><b>Don't have an account?</b> <br><font size= "1.5"> Register now for speed up <br> and secure checkout.</font></TD>
    <TD><p><A HREF="register.php">Register</A></p>
    </TD>
</TR>

<TR ALIGN="left" >
    <TD align = "right"><b>Don't want to register</b> </TD>
    <TD><p><A HREF="checkout.php">Proceed to Checkout</A></p>
    </TD>
</TR>




</TABLE>














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