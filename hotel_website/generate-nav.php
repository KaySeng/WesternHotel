<?php
 if (!empty($_SESSION["customer"])){

   echo '<a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Western Sydney Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="search.php">Search Room</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="book.php">Book Room</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="logoff.php">Logoff</a>
            </li>
          </ul>
        </div>';

 }
 else if(!empty($_SESSION["admin"])){

  echo '<a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Western Sydney Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="pricing.php">Change Pricing</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="browse.php">Browse Database Tables</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="logoff.php">Logoff</a>
            </li>
          </ul>
        </div>';
 }
 else{
  echo '<a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Western Sydney Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="register.php">Registration</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="customerLogin.php">Customer Login</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="adminLogin.php">Administrator Login</a>
            </li>
          </ul>
        </div>';
 }

?>

<!-- <?php

  if (!empty($_SESSION["customer"]))
  {
    //header("location: logoff.php");


    $customer = $_SESSION["customer"];
    //$accesscustomer = $_SESSION["customer"];
	//$accessAdmin = $_SESSION["admin"];
	
  if ($customer =='customer'){
    echo '<p><a href="index.php">Home</a></p>';
	echo '<p><a href="search.php">Search Room</a></p>';
	echo '<p><a href="book.php">Book Room</a></p>';
	echo '<p><a href="logoff.php">Logoff</a></p>';
  }
  else
		 header("location: logoff.php");
  }
  else if(!empty($_SESSION["admin"]))
  {
	  $admin = $_SESSION["admin"];
	  //$accessAdmin = $_SESSION["admin"];
	  
	  if ($admin =='admin'){
    echo '<p><a href="index.php">Home</a></p>';
	echo '<p><a href="pricing.php">Change Pricing</a></p>';
	echo '<p><a href="browse.php">Browse Database Tables</a></p>';
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
  
?> -->
   