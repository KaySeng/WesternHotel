	<?php
	session_start();
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>WESTERN SYDNEY HOTEL</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/business-casual.css" rel="stylesheet">

	</head>

	<body>
		
		<?php

		$rid = "";
		$checkin = "";
		$checkout = "";

		$ridMsg = "";
		$checkinMsg = "";
		$checkoutMsg = "";

		$registered = "";

		if (isset($_POST["submit"])){

		 // $userName = $_SESSION["who"];
			session_start();
			$userName = $_SESSION["who"];

			$rid = $_POST["rid"];
			if (empty($rid)){
				$ridMsg = '<span class="error"> This field is mandatory. Please enter a password.</span>';
			}

			$checkin = $_POST["checkin"];
			if (empty($checkin)){
				$checkinMsg = '<span class="error"> This field is mandatory. Please enter a password.</span>';
			}

			$checkout = $_POST["checkout"];
			if (empty($checkout)){
				$checkoutMsg = '<span class="error"> This field is mandatory. Please enter your given name.</span>';
			}

			if (strlen($ridMsg)==0  && strlen($checkinMsg)==0 && strlen($checkoutMsg)==0)
			{
				require_once("includes/dbconn.php");

				$rid= mysqli_real_escape_string($conn,$rid);
				$checkin= mysqli_real_escape_string($conn,$checkin);
				$checkout= mysqli_real_escape_string($conn,$checkout );

				$sql= "SELECT rid FROM rooms";


				$rs = mysqli_query($conn, $sql)
				or die("Error" . mysqli_error($conn));
		 /*
	if(mysqli_num_rows($rs)==1)
	    {
	      $userNameMsg='<span class="error"> This ID already exists.</span>';
	    }
		*/
	    //else{


	    $insertquery="INSERT INTO bookings (rid, username, checkin, checkout,
	    cost)
	    VALUES ('$rid', '$userName', '$checkin', '$checkout', 20)";

	    $insert = mysqli_query($conn, $insertquery)
	    or die("Error with Inserting values!    " . mysqli_error($conn));

	    $registered="You have successfully booked a room!";
	}

}


?>



<h1 class="site-heading text-center text-white d-none d-lg-block">
	<span class="site-heading-lower">WESTERN SYDNEY HOTEL</span>
</h1>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
	<div class="container">
		<?php include 'generate-nav.php';?>
	</div>

</nav>

<div class = "container">
	<div class="intro-text left-0 text-center bg-faded p-5 rounded">
		<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name = "myForm" >
			<div class="col-sm-12">
				<h1> Room Booking: </h1>
			</div>
			<div class="form-group">

				<?php
				require_once("includes/dbconn.php");
				$sql = "SELECT rid FROM rooms ";
				$results = mysqli_query($conn, $sql)
				or die ('Problem with query' . mysqli_error());
				?>
				<label class="control-label col-sm-2"for="rid">rid:</label>

				<div class="col-md-6 offset-md-3">
					<select class="form-control" name="rid" />

					<?php
					while ($row = mysqli_fetch_array($results)) { ?>
						<option value = <?php echo
						$row["rid"]?>> <?php echo $row["rid"]?> 
					</option>
					<!-- output the other fields here from the $row array -->
				<?php }
				mysqli_close($conn); ?>

			</select>

			<div class="form-group">
				<label class="control-label col-sm-2" for="checkin">Check-in:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="checkin" size=11 maxlength = "20" id="checkin" placeholder="2000-08-29" value="<?php echo htmlspecialchars($checkin) ?>" required><?php echo $checkinMsg; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="checkout">Check-out:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="checkout" size=11 maxlength = "20" id="checkout" placeholder="2000-10-29" value="<?php echo htmlspecialchars($checkout) ?>" required><?php echo $checkoutMsg; ?>
				</div>
			</div>

			<div class="form-group">        
				<div class="col-sm-offset-2 col-md-6 offset-md-3">
					<button type="submit" class="btn btn-default" name="submit" value="Submit">Submit</button>
					<?php echo $registered; ?>
				</div>
			</div>
		</div>
	</div>

</form>
</div>
</div>
<footer class="footer text-faded text-center py-5">
	<div class="container">
		<?php include 'footer.php';?>
	</div>
</footer>
</body>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
