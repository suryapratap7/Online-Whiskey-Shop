<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"


<html>
<head>
<title>Whisky Shop</title>
<meta name="keywords" content="KEYWORDS" />
<meta name="description" content="DESCRIPTION" />
<meta name="copyright" content="Tiram &copy; 2005" />
<link rel="stylesheet" href="style.css" type="text/css" media="all" title="Default styles" />
<SCRIPT language="Javascript" src="validation.js"></script>
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
<li><a href="sample.html">Samples</a></li>

<li><a href="aboutWhisky.html"> About Whisky </a></li>


</ul>

</div>



<?php

  if ( ! isset( $_REQUEST["btnRegister"] ) )
  {

    $firstName = "";
    $lastName  = "";
    $userId    = "";
    $password  = "";
    $password2 = "";
    $contactNumber = "";
    $emailId = "";
    $address = "";
    $message   = "";
    $action    = "register.php";
    $btnRegisterCaption = "Register";
  }
  else
  {

    $firstName = trim($_REQUEST['txtFirstName']);
    $lastName  = trim($_REQUEST['txtLastName']);
    $userId    = trim($_REQUEST['txtUserId']);
    $password  = trim($_REQUEST['txtPassword']);
    $password2 = trim($_REQUEST['txtPassword2']);
    $contactNumber = trim($_REQUEST['txtPhoneNumber']);
    $emailId = trim($_REQUEST['txtEmailId']);
    $address = trim($_REQUEST['txtAddress']);

    if ($firstName == "" || $lastName == "" || $userId == "" || $password == "" || $password2 == "" || $contactNumber == "" || $emailId == "" || $address == "")
    {

      $action    = "register.php";
      $message = "please complete all fields";
      $btnRegisterCaption = "Register";
    }
    elseif ($password != $password2)
    {

      $action    = "register.php";
      $message = "ERROR: passwords are different.";
      $btnRegisterCaption = "Register";
    }
    else
    {

      $link =  mysql_connect("localhost", "21116053", "21116053");
      if ( ! $link ) die("Surya: Cannot connect to mySQL");


      $selectedOk = mysql_select_db("21116053");
      if ( ! $selectedOk  ) die("Surya:  Cannot select shop database");


      define("DUPLICATE_KEY", 1062);
      $encrytedPassword = crypt($password, "intercom");


      $query = "INSERT INTO shop (id, firstName, lastName, password, contactNumber, emailId, address)
                VALUES ('$userId', '$firstName', '$lastName', '$encrytedPassword', '$contactNumber', '$emailId', '$address')";


      $passwords = mysql_query($query);


      $errno = mysql_errno();


      if ( $errno == 0)
      {

        $action    = "logOn.php";
        $message = "Registration successful";
        $btnRegisterCaption = "Logon";
      }
      else if ( $errno == DUPLICATE_KEY )
      {

        $action    = "register.php";
        $message = "ERROR: this user ID already exists";
        $btnRegisterCaption = "Register";
      }
      else
      {
        // error must be something else!
        print "<p>Surya: Cannot execute <B>$query</B></p>";
      }
    }
  }

?>



 <form name="Payform" action="<? echo $action ?>" onSubmit="return checkForm()" method="post">

<TABLE ALIGN="center" BORDER=0 CELLSPACING=4 CELLPADDING=0 WIDTH="50%">

<TR ALIGN="left" VALIGN="middle">
    <TH style="width: 30%">First name</TH>
    <TD><input type="text" name="txtFirstName"  style="width: 60%" value="<? echo $firstName ?>"></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TH>Last name</TH>
    <TD><input type="text" name="txtLastName" style="width: 60%" value="<? echo $lastName ?>"></TD>
</TR>

 <TR ALIGN="left" VALIGN="middle">
    <TH>User ID</TH>
    <TD><input type="text" name="txtUserId"  style="width: 60%" value="<? echo $userId ?>"></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TH>Password</TH>
    <TD><input type="password" name="txtPassword"  style="width: 60%" value="<? echo $password ?>"></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TH>Retype password</TH>
    <TD><input type="password" name="txtPassword2"  style="width: 60%" value="<? echo $password2 ?>"></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TH>Contact Number</TH>
    <TD><input type="text" name="txtPhoneNumber"  style="width: 60%" value="<? echo $contactNumber ?>"></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TH>Email Id</TH>
    <TD><input type="text" name="txtEmailId"  style="width: 60%" value="<? echo $emailId ?>"></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TH>Address</TH>
    <TD><input type="text" name="txtAddress"  style="width: 60%" value="<? echo $address ?>"></TD>
</TR>

 <TR ALIGN="left" VALIGN="middle">
    <TD>&nbsp;</TD>
    <TD><? echo $message ?></TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TD>&nbsp;</TD>
    <TD>&nbsp;</TD>
</TR>

<TR ALIGN="left" VALIGN="middle">
    <TD>&nbsp;</TD>
    <TD><input type="submit" name="btnRegister" value="<? echo $btnRegisterCaption ?>" >
    </TD>
</TR>

</TABLE>
</form>









<div id="footer">

<ul>
<li><a href="about.html">About Us </a> </li>
<li><a href = "contact.html"> Contact us </a></li>
<li><a href = "terms.html" > Term and Coditions </a> </li>
<li><a href = "" > Site map </a> </li>
<li><a href = "" > Customer Services </a> </li>
<li><a href = "" > Social & Media </a> </li>
</ul>
</div>
</div>


</body>
</html>