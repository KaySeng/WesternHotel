<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
	
	<h1 class="site-heading text-center text-white d-none d-lg-block">
		<span class="site-heading-lower">WESTERN SYDNEY HOTEL</span>
	</h1>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
		<div class="container">
			<?php include 'generate-nav.php';?>
		</div>

	</nav>
	
	<div id="section" class="page-section clearfix">
		<?php
		require_once("includes/dbconn.php");
		
		$beds = "";
		$orientation = "";
		$checkin = "";
		$checkout = "";

		$bedsMsg = "";
		$orientationMsg = "";
		$checkinMsg = "";
		$checkoutMsg = "";

		$registered = "";
		$result = "";

		if (isset($_POST["submit"])){
			
			$beds = $_POST["beds"];
			if (empty($beds)){
				$bedsMsg = '<span class="error"> This field is mandatory.</span>';
			}
			else{
				if ($beds == 0){
					$bedsMsg = '<span class="error"> This field is mandatory.</span>';
				}
			}
			
			$orientation = $_POST["orientation"];
			if (empty($orientation)){
				$orientationMsg = '<span class="error"> This field is mandatory. Please enter a password.</span>';
			}
			
			$checkin = $_POST["checkin"];
			if (empty($checkin)){
				$checkinMsg = '<span class="error"> This field is mandatory. Please enter check-in date (YYYY-MM-DD).</span>';
			}
			else
			{
				$pattern = "/^\d{4}\-\d{2}-\d{2}$/";
				if (preg_match($pattern, $checkin)){
	// substr() returns the portion of string specified by the start and length parameters. 
					$year = substr($checkin, 0, 4);
					$month = substr($checkin, 5, 2);
					$day = substr ($checkin, 8, 2);
					if (checkdate($month, $day, $year))
						$checkinMsg =  "";
					else
						$checkinMsg = "Error: The date format is correct, but it is not a valid Gregorian date!";
				}
				else {
					$checkinMsg = "Error: The date format is incorrect! (YYYY-MM-DD)";
				}
			}
			$checkout = $_POST["checkout"];
			if (empty($checkout)){
				$checkoutMsg = '<span class="error"> This field is mandatory. Please check-out date (YYYY-MM-DD).</span>';
			}
			else
			{
				$pattern = "/^\d{4}\-\d{2}-\d{2}$/";
				if (preg_match($pattern, $checkout)){
	// substr() returns the portion of string specified by the start and length parameters. 
					$year = substr($checkout, 0, 4);
					$month = substr($checkout, 5, 2);
					$day = substr ($checkout, 8, 2);
					if (checkdate($month, $day, $year))
						$checkoutMsg =  "";
					else
						$checkoutMsg = "Error: The date format is correct, but it is not a valid Gregorian date!";
				}
				else {
					$checkoutMsg = "Error: The date format is incorrect! (YYYY-MM-DD)";
				}
			}
			$curdate=strtotime($checkin);
			$mydate=strtotime($checkout);

			if($curdate > $mydate)
			{
				$checkoutMsg = '<span class="status expired">Expired</span>';
			}

			$beds= mysqli_real_escape_string($conn,$beds);
			$orientation= mysqli_real_escape_string($conn,$orientation);
			$checkin= mysqli_real_escape_string($conn,$checkin);
			$checkout= mysqli_real_escape_string($conn,$checkout );
			
		}

		?>
		<div class = "container">
			<div class="intro-text left-0 text-center bg-faded p-5 rounded">
				<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="custinfo" name = "myForm" >
					<div class="col-sm-12">
						<h1> Registration Form: </h1>
						<p> Please complete the following form: </p>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2"for="beds">Number of Bed:</label>
						<div class="col-md-6 offset-md-3">
							<select class="form-control" id="beds" name="beds" value="<?php echo htmlspecialchars($beds) ?>" />
								<option value="0">--</option>
								<option value="1">1 bed</option>
								<option value="2">2 beds</option>
								<option value="3">3 beds</option>
								</select> <?php echo $bedsMsg; ?> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2"for="orientation">Room Orientation:</label>
							<div class="col-md-6 offset-md-3">
								<select class="form-control" id="rOrientation" name="orientation" />
								<option value="--">--</option>
								<option value="N">North</option>
								<option value="S">South</option>
								<option value="W">West</option>
								<option value="E">East</option>
								</select> <?php echo $orientationMsg; ?> 
							</div>
						</div>
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

				<?php



				if (strlen($bedsMsg)==0  && strlen($checkinMsg)==0 && strlen($checkoutMsg)==0)
				{

					if(empty($beds)){
						$sql = "SELECT DISTINCT rooms.rid, beds, orientation, price FROM rooms
						LEFT JOIN bookings ON bookings.rid = rooms.rid 
						WHERE rooms.beds = '$beds' and rooms.orientation = '$orientation' and checkout <= '$checkin' or checkin is null;";
					}
					else{
						$sql = "SELECT rooms.rid, rooms.beds, rooms.orientation, rooms.price From rooms LEFT JOIN bookings ON
						bookings.rid = rooms.rid WHERE rooms.beds = '$beds' and rooms.orientation = '$orientation'";
					}
	
	$rs = mysqli_query($conn, $sql)
	or die("Error" . mysqli_error($conn));
	?>
	<?php
	if (mysqli_num_rows($rs)>0) { ?>
		<p>Staff ID <strong><?php echo "$beds"; ?></strong></p>
		<table> <!-- Purchase table -->
			<tr>
				<th>rid</th>
				<th>beds</th>
				<th>orientation</th>
				<th>price</th>


			</tr>
			<?php
			while ($row = mysqli_fetch_array($rs)) { ?>
				<tr>
					<td><?php echo $row["rid"]?></td>
					<td><?php echo $row["beds"]?></td>
					<td><?php echo $row["orientation"]?></td>
					<td><?php echo $row["price"]?></td>


					<!-- output the other fields here from the $row array -->
				</tr>
			<?php }
			mysqli_close($conn); ?>
		</table>
	<?php }
	else {?>

		
		
	<?php } 
	
}
?>
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
