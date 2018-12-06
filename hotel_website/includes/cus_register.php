<?php 
include_once("dbconn.php");

$userName = $_POST['uName'];
$pWord = $_POST['pWord'];
$gName = $_POST['givenName'];
$fName = $_POST['fName'];
$address = $_POST['address'];
$state = $_POST['state'];
$postcode = $_POST['pCode'];
$mobile = $_POST['mNumber'];
$email = $_POST['email'];

$sql="INSERT INTO customers (username, password, gname, sname, address, state, postcode, mobile, email)
VALUES ('$userName', '$pWord', '$gName', '$fName', '$address',
'$state', '$postcode', '$mobile', '$email')";

mysqli_query($conn, $sql);

header("Location: ../index.php?register=success");
?>