<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href ="assignment.css">
	<title>Show Table</title>
	<style>
	table, th, td {
		border: 1px solid black;
	}
</style>
<script src="javaScript.js" type="text/javascript"></script>
<?php

require_once("includes/dbconn.php");
$table=mysqli_real_escape_string($conn,$_POST["tables"]);


?>
</head>

<body>
	<div id = "header">
		<h1> Western Sydney Hotel </h1>
	</div>
	<div id = "nav">
		<?php
		include 'generate-nav.php';

		?>
	</div>

	<div id ="section">

		<?php
		if (empty($table)){
			header("location : browse.php");
		}




		if($table == 'rooms'){
			$rooms="SELECT * FROM rooms";
			$rs = mysqli_query($conn, $rooms)
			or die ('Problem with query' . mysqli_error()); 

			?>
			<h2> Table : <?php echo $table ?></h2>
			<table>
				<tr>
					<th> Room ID</th>
					<th> Level </th>
					<th> Beds</th>
					<th> Orientation</th>
					<th> Price</th>
				</tr>

				<?php
				while($row=mysqli_fetch_array($rs)){
					?>
					<tr>
						<td><?php echo $row['rid'] ?></td>
						<td><?php echo $row['level'] ?></td>
						<td><?php echo $row['beds'] ?></td>
						<td><?php echo $row['orientation'] ?></td>
						<td><?php echo $row['price'] ?></td>
					</tr>
					<?php
				}
				'</table>';
			}
			else if($table == 'administrators'){
				$administrators="SELECT * FROM administrators";
				$rs = mysqli_query($conn, $administrators)
				or die ('Problem with query' . mysqli_error()); 
				?>
				<h2> Table : <?php echo $table ?></h2>
				<table>
					<tr>
						<th> Username</th>
						<th> Password</th>
						<th> Given Name</th>
						<th> Surname</th>
					</tr>
					<?php
					while($row=mysqli_fetch_array($rs)){

						?>
						<tr>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['password'] ?></td>
							<td><?php echo $row['gname'] ?></td>
							<td><?php echo $row['sname'] ?></td>
						</tr>



						<?php
					}
					'</table>';
				}
				else if($table == 'customers'){
					$customers="SELECT * FROM customers";
					$rs = mysqli_query($conn, $customers)
					or die ('Problem with query' . mysqli_error()); 
					?>
					<h2> Table : <?php echo $table ?></h2>
					<table>
						<tr>
							<th> Username</th>
							<th> Password</th>
							<th> Given Name</th>
							<th> Surname</th>
							<th> Address</th>
							<th> State</th>
							<th> Postcode</th>
							<th> Mobile</th>
							<th> Email</th>
						</tr>
						<?php
						while($row=mysqli_fetch_array($rs)){
							?>
							<tr>
								<td><?php echo $row['username'] ?></td>
								<td><?php echo $row['password'] ?></td>
								<td><?php echo $row['gname'] ?></td>
								<td><?php echo $row['sname'] ?></td>
								<td><?php echo $row['address'] ?></td>
								<td><?php echo $row['state'] ?></td>
								<td><?php echo $row['postcode'] ?></td>
								<td><?php echo $row['mobile'] ?></td>
								<td><?php echo $row['email'] ?></td>

							</tr>

							<?php
						}
						'</table>';
					}
					else if ($table == 'bookings'){
						$bookings="SELECT * FROM bookings";
						$rs = mysqli_query($conn, $bookings)
						or die ('Problem with query' . mysqli_error()); 
						?>
						<h2> Table : <?php echo $table ?></h2>
						<table>
							<tr>
								<th> bid</th>
								<th> Room ID</th>
								<th> Username</th>
								<th> Check-In</th>
								<th> Check-Out</th>
								<th> Cost</th>
								<th> Btime</th>
							</tr>
							<?php
							while($row=mysqli_fetch_array($rs)){
								?>
								<tr>
									<td><?php echo $row['bid'] ?></td>
									<td><?php echo $row['rid'] ?></td>
									<td><?php echo $row['username'] ?></td>
									<td><?php echo $row['checkin'] ?></td>
									<td><?php echo $row['checkout'] ?></td>
									<td><?php echo $row['cost'] ?></td>
									<td><?php echo $row['btime'] ?></td>

								</tr>

							</div>
							<?php
						}
						'</table>';
					}

					?>

					<div id = "footer">
						<?php include 'footer.php';?>
					</div>
				</body>
				</html>