<?php

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
	
	 if (strlen($bedsMsg)==0  && strlen($checkinMsg)==0 && strlen($checkoutMsg)==0)
    {
      require_once("dbconn.php");

      $beds= mysqli_real_escape_string($dbConn,$beds);
  $orientation= mysqli_real_escape_string($dbConn,$orientation);
  $checkin= mysqli_real_escape_string($dbConn,$checkin);
  $checkout= mysqli_real_escape_string($dbConn,$checkout );

  $sql= "SELECT rooms.rid, beds, orientation, price FROM bookings 
	INNER JOIN rooms ON bookings.rid = rooms.rid 
	WHERE bookings.checkin = '$checkin'";
  
  
  $rs = mysqli_query($dbConn, $sql)
     or die("Error" . mysqli_error($dbConn));
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
mysqli_close($dbConn); ?>
</table>
<?php }
else {?>

	<p>No Staff ID <?php echo $beds ?> in the database.</p> 
	
<?php } 
     
    }
}

?>