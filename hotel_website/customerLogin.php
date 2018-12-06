<?php

$userName = "";
$pWord = "";
$userNameMsg = "";
$pWordMsg = "";
$logincorrect = false;

// if this is a submission of the web form
if (isset($_POST["submit"])) {
  // Here we only validate that id and password are not empty. 
  // More validations for them can be added inside this code block
	$userName = $_POST["userName"];
	if (empty($userName))
		$userNameMsg = '<span class="error"> This field is mandatory. Please enter userName.</span>';
	
	$pWord = $_POST["pWord"];
	if (empty($pWord))
		$pWordMsg = '<span class="error"> This field is mandatory. Please enter password.</span>';

	if (strlen($userNameMsg)==0 && strlen($pWordMsg)==0) {
		require_once("includes/dbconn.php");
	 // sanitize them before passing to database
		$userName = mysqli_real_escape_string($conn, $userName);
		$pWord = mysqli_real_escape_string($conn, $pWord);
		$sql = "select username from customers where userName = '$userName' and password = '$pWord'";
		$rs = mysqli_query($conn, $sql)
		or die("Error when looking up username and password" . mysqli_error($conn));
		if (mysqli_num_rows($rs) > 0 ) {
		 // username and password correct
			session_start();
			$_SESSION["customer"] = 'customer';
			$_SESSION["who"] = $userName;
			$row = mysqli_fetch_array($rs);
        // $_SESSION["customer"] = $row["username"];
			mysqli_close($conn);
			$logincorrect = true;
         // redirect to the staffmenu.php
			header("location: index.php");
		}
		mysqli_close($conn);
	}
}
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
	
	<h1 class="site-heading text-center text-white d-none d-lg-block">
		<span class="site-heading-lower">WESTERN SYDNEY HOTEL</span>
	</h1>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
		<div class="container">
			<?php include 'generate-nav.php';?>
		</div>

	</nav>

	<section class="page-section clearfix">
		<div class = "container"> 
			<div class="intro-text left-0 text-center bg-faded p-5 rounded">
				<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="col-sm-12"> 
						<h1> Customer's Login page: </h1>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="uName">Username:</label>
						<div class="col-md-6 offset-md-3">
							<input type="text" class="form-control" placeholder="Enter Username" name="userName" maxlength="20" value="<?php echo htmlspecialchars($userName) ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="password">Password:</label>
						<div class="col-md-6 offset-md-3">          
							<input type="password" class="form-control" placeholder="Enter password" name="pWord" value="<?php echo htmlspecialchars($pWord) ?>" required>
						</div>
						<br/>
						<div class="form-group">        
							<div class="col-sm-offset-4 col-sm-15">
								<div class="col-md-6 offset-md-3">
									<div class="checkbox">
										<label><input type="checkbox" name="remember"> Remember me</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">        
							<div class="col-sm-offset-2 col-md-6 offset-md-3">
								<button type="submit" class="btn btn-default" name="submit" value="Submit">Submit</button>
							</div>
						</div>
					</form>

					<?php
					if (isset($_POST['submit']) && !$logincorrect) 
						echo "<p> <span class='error'>Login details incorrect. Please try again!</span></p>";
					?>
				</div>
			</section>

			<footer class="footer text-faded text-center py-5">
				<div class="container">
					<?php include 'footer.php';?>
				</div>
			</footer>

			<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		</body>
		</html>