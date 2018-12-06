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
	<script src="javaScript.js" type="text/javascript"></script>

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
	<div class="container">
		<div class="intro-text left-0 text-center bg-faded p-5 rounded">
		<form class="form-horizontal" action="includes/cus_register.php" method="POST">
			<div class="col-sm-12"> 
			<h1> Registration Form: </h1>
			<p> Please complete the following form: </p>
		</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="uName">Username:</label>
				<div class="col-md-6 offset-md-3">
					<input type="text" class="form-control" placeholder="Enter Username" name="uName" maxlength="20" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Password:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="password" class="form-control" placeholder="Enter password" name="pWord" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="rpassword">Retype-Password:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="password" class="form-control"  name="rPassword" id = "rPassword" placeholder="Enter password" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="givenName">Given Name:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="givenName" maxlength = "20" id = "gName" placeholder="Given name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="fName">Family Name:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="fName" maxlength = "20" id="fName" placeholder="Family name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Address:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="address" maxlength = "40" placeholder="Address" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2"for="state">States:</label>
				<div class="col-md-6 offset-md-3">
					<select class="form-control" id="state" name="state" required="">
						<option value = "act"> Australian Capital Territory </option>
						<option value = "nsw"> New South Wales </option>
						<option value = "nt"> Northern Territory </option>
						<option value = "ql"> Queensland </option>
						<option value = "sa"> South Australia </option>
						<option value = "ta"> Tasmania </option>
						<option value = "vic"> Victoria </option>
						<option value = "wa"> Western Australia </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pCode">Postcode:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="pCode" maxlength = "4" id = "pCode" placeholder="1234" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mNumber">Mobile Number:</label>
				<div class="col-md-6 offset-md-3">          
					<input type="text" class="form-control" name="mNumber" id = "mobile" placeholder="0412345678" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email address</label>
				<div class="col-md-6 offset-md-3">
				<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>

				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
			</div>
			<!-- <div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label><input type="checkbox" name="remember"> Remember me</label>
					</div>
				</div>
			</div> -->
			<div class="form-group">        
				<div class="col-sm-offset-2 col-md-6 offset-md-3">
					<button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
				</div>
			</div>
		</form>
		</div>
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
