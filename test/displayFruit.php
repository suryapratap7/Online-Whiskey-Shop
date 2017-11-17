<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>displayFruit</title>
<meta name="keywords" content="KEYWORDS" />
<meta name="description" content="DESCRIPTION" />
<meta name="copyright" content="Tiram &copy; 2005" />
<link rel="stylesheet" href="default.css" type="text/css" media="all" title="Default styles" />

<script type="text/javascript">

  // keep track of whether an item has been selected
   var radIdClicked = false;
   
  function radIdClick()
  {
    radIdClicked = true;
  }
 
  // btnSubmitClick() will be executed when the user clicks the Submit button
  function btnSubmitClick()
  {
    //  get the form
    var frmItems = document.getElementById("frmItems");
   
    // if no item has been selected then display an error, else submit the form 
    if ( ! radIdClicked )
      alert("Please select an item");
    else
      frmItems.submit(); //to showItem.php
  }
  
</script>

</head>
<body>
<h1>Display Fruit</h1>

<?php

  //  establish a connection to the server
  $connection = mysql_connect("localhost", "2000238", "2000238");
  if ( ! $connection ) die("RAY: Cannot connect to server");
  echo "<p>Connected Ok</p>\n";

  //  select the database
  $database = mysql_select_db("2000238");
  if ( ! $database ) die("RAY: Cannot connect to database");
  echo "<p>Selected database Ok</p>\n";

  //  set up an SQL query to display all the data
  $query = "SELECT * FROM fruit";

  //  execute the query, save results in the resultSet
  $resultSet = mysql_query($query);
  if ( ! $resultSet ) die("RAY: Cannot execute query");
  echo "<p>Executed query Ok</p>\n";

?>

<form id="frmItems" action="showItem.php">

  <table border="1" width="50%" align="center">
  <tr> <th>Id</th> <th>Name</th> <th>Price</th> <th>Select</th> </tr>

  <?php

    // fetch the first row
    $row = mysql_fetch_row($resultSet);

    //  all the while we have a row...
    while ( $row != null )
    {
      // get each element of the row
      $id = $row[0];
      $name = $row[1];
      $price = $row[2];

      //  display another table row on the web page
      //  Note how the last column will contain a radio button whose value is the item's id
      //  and that we have included an onclick event to call a JavaScript handler (see line 17 above)
      echo "<tr> <td>$id</td> <td>$name</td> <td>$price</td>
                 <td><input type=\"radio\" name=\"radId\" value=\"$id\" onclick=\"radIdClick();\" /> </td>
            </tr>\n";

      //  and try to fetch another row...
      $row = mysql_fetch_row($resultSet);
    }

  ?>

   </table>
  
   <!-- Note how the type is now a button (not submit) and calls a JavaScript event handler --> 
   <input type="button" name="btnSubmit" value="Submit" onclick="btnSubmitClick();"/>
  
</form>


</body>
</html>