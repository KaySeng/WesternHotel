<?php
  // require_once("nocache.php");
  session_start();
  
  if (!empty($_SESSION["customer"]))
  {
    //header("location: logoff.php");


    $customer = $_SESSION["who"];
    $accesscustomer = $_SESSION["customer"];
	//$accessAdmin = $_SESSION["admin"];
	
  if ($accesscustomer =='anything'){
    echo '<p><a href="index.php">Home</a></p>';
	echo '<p><a href="index.php">Search Room</a></p>';
	echo '<p><a href="index.php">Book Room</a></p>';
	echo '<p><a href="logoff.php">Logoff</a></p>';
  }
  else
		 header("location: logoff.php");
  }
  else if(!empty($_SESSION["admin"]))
  {
	  $admin = $_SESSION["who"];
	  $accessAdmin = $_SESSION["admin"];
	  
	  if ($accessAdmin =='alice'){
    echo '<p><a href="index.php">Home</a></p>';
	echo '<p><a href="index.php">Change Pricing</a></p>';
	echo '<p><a href="index.php">Browse Database Tables</a></p>';
	echo '<p><a href="logoff.php">Logoff</a></p>';
  }
   else
		 header("location: logoff.php");
  }
  
 
  else
  {
	  echo '<p><a href="index.php">Home</a></p>';
	  echo '<p><a href="register.php">Customer Registration</a></p>';
	  echo '<p><a href="customerLogin.php">Customer Login</a></p>';
	  echo '<p><a href="adminLogin.php">Administrator Login</a></p>';
	  
  }
  
?>
   