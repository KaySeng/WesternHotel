<?php
$dbServerName = "localhost";
$dbUserName = "id7921458_root";
$dbPassword = "!Password1";
$dbName = "id7921458_westernhotel260";

	// $dbServerName = "localhost";
	// $dbUserName = "root";
	// $dbPassword = "!Hitmation1";
	// $dbName = "firstweb";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
if(!$conn) {
    exit("Failed to connect to database " . mysqli_connect_error());
}





