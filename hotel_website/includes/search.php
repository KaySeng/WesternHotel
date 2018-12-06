<?php 
include_once("dbconn.php");

$beds = $_POST['beds'];
$orientation = $_POST['orientation'];

	$sql = "SELECT  rooms.rid, beds, orientation, price FROM rooms";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0){ ?>
		<table>
			<tr>
				<th>rid</th>
				<th>beds</th>
				<th>orientation</th>
				<th>price</th>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row["rid"]?></td>
					<td><?php echo $row["beds"]?></td>
					<td><?php echo $row["orientation"]?></td>
					<td><?php echo $row["price"]?></td>
				</tr>
			<?php }
			mysqli_close($conn); ?>
		</table>
	<?php }
	else {?>

		
		
	<?php } 



// header("Location: ../search.php?register=success");
?>