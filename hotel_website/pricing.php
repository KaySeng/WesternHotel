<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href ="assignment.css">
	<title>WESTERN SYDNEY HOTEL</title>
	<script src="javaScript.js" type="text/javascript"></script>
</head>

<body>
	
	<?php

	$rid = "";
	$price = "";

	$ridMsg = "";
	$priceMsg = "";

	$registered = "";

	if (isset($_POST["submit"])){
		
		$rid = $_POST["rid"];
		if (empty($rid)){
			$ridMsg = '<span class="error"> This field is mandatory. Please enter a password.</span>';
		}
		
		$price = $_POST["price"];
		if (empty($price)){
			$priceMsg = '<span class="error"> This field is mandatory. Please enter a password.</span>';
		}
		else{
			if (filter_var($price, FILTER_VALIDATE_FLOAT) < 10)  {
				$priceMsg = '<span class="error"> please enter a number between 10.0 -- 999.99.</span>';
			}
			else if  (filter_var($price, FILTER_VALIDATE_FLOAT) > 999.99){
				$priceMsg = '<span class="error"> please enter a number between 10.0 -- 999.99.</span>';
			}
		}
		
		if (strlen($ridMsg)==0  && strlen($priceMsg)==0)
		{
			require_once("includes/dbconn.php");

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$update = "UPDATE rooms SET rooms.price='$price' WHERE rooms.rid='$rid'";

			if ($conn->query($update) === TRUE) {
				$priceMsg = '<span class="error"> Record updated successfully';
			} else {
				$priceMsg = '<span class="error">Error updating record:' . $conn->error;
			}



			
	 /*
if(mysqli_num_rows($rs)==1)
    {
      $userNameMsg='<span class="error"> This ID already exists.</span>';
    }
	*/
    //else{

    
    
    //$registered="You have been registered!";
}

}


?>



<div id ="header">
	<h1>WESTERN SYDNEY HOTEL</h1>
</div>

<div id = "nav">
	<?php include 'generate-nav.php';?>
</div>


<div id="section">
	<h1>Rooming booking <br /></h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name = "myForm" >

		<?php
		require_once("includes/dbconn.php");
		$sql = "SELECT rid FROM rooms ";
		$results = mysqli_query($conn, $sql)
		or die ('Problem with query' . mysqli_error());
		?>
		rid
		<select name="rid">
			
			<?php
			while ($row = mysqli_fetch_array($results)) { ?>
				<option value = <?php echo
				$row["rid"]?>> <?php echo $row["rid"]?> 
			</option>
			

			<!-- output the other fields here from the $row array -->

		<?php }
		mysqli_close($conn); ?>
	</select>
	<p><label for="price">New Price: </label>
		<input type="text" id="price" name="price" size=11 maxlength = "10" value="<?php echo htmlspecialchars($price) ?>" />
		<?php echo $priceMsg; ?>
		
	</p>
	
	<p>  <input type="submit" name="submit" value="Submit"/> 
		<input type="reset" value="Clear" /> 
		<?php echo $registered; ?>
	</p>
</form>
</div>

<div id = "footer">
	<?php include 'footer.php';?>
</div>
</body>
</html>