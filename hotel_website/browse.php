<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href ="assignment.css">
	<title>WESTERN SYDNEY HOTEL - Browse Table</title>
	<script src="javaScript.js" type="text/javascript"></script>
</head>

<body>
	
	<div id ="header">
		<h1>WESTERN SYDNEY HOTEL</h1>
	</div>
	
	<div id = "nav">
		<?php include 'generate-nav.php';
		?>
	</div>
	
	<div id="section">
		<form id="myForm" action="showtable.php" method="post">
			<?php 
/**
 * Allows one to view all tables and their data in a database
 *
 * To use this script ensure you have filled in your TWA username and database password
 */
require_once("includes/dbconn.php");
// $dbConn=mysqli_connect("localhost", "twa260", "twa260ym", "westernhotel260");
// if ( !$dbConn ) {
// 	die("Connection failed: " . mysqli_connect_error());
// }

$sql = "SHOW TABLES FROM id7921458_westernhotel260";
$rs = mysqli_query($conn, $sql)
or die ('Problem with query' . mysqli_error());
?>
<p> Browse Table: </p>
<?php
while ($row = mysqli_fetch_array($rs)) { ?>		
	<?php
	echo '<input type="radio" id="tables" name="tables" value="'.$row[0].'"/> '.$row[0].' ';
	?>
	<br>
	
	
	
	<?php
} 
mysqli_close($conn);
?>
<p><input type="submit"  value="Submit">
	<input type="reset" value="Reset"></p>
</form>
</div>
<div id = "footer">
	<?php include 'footer.php';?>
</div> 
</body>
</html>