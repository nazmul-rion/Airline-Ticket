<?php
session_start();
?>
<html>

<head>
	<title>Add Flight Schedule Details</title>
</head>

<body>
	<?php
	$flight_no = $_POST['flight_no'];
	$origin = $_POST['origin'];
	$destination = $_POST['destination'];
	$dep_date = $_POST['dep_date'];
	$arr_date = $_POST['arr_date'];
	$dep_time = $_POST['dep_time'];
	$arr_time = $_POST['arr_time'];
	$seats_eco = $_POST['seats_eco'];
	$seats_bus = $_POST['seats_bus'];
	$price_eco = $_POST['price_eco'];
	$price_bus = $_POST['price_bus'];

	if (isset($_POST['Submit'])) {
		include('connect.php');
		$query = "INSERT INTO Flight_Details (flight_no,from_city,to_city,departure_date,arrival_date,departure_time,arrival_time,seats_economy,seats_business,price_economy,price_business) 
			VALUES ('$flight_no', '$origin', '$destination', '$dep_date', '$arr_date', '$dep_time', '$arr_time', '$seats_eco', '$seats_bus', '$price_eco', '$price_bus')";
		if (mysqli_query($con, $query)) {
			echo "<h1>Records inserted successfully..!</h1>";
			header("location: add_flight_details.php?msg=success");
		} else {
			echo "<ERROR: Could not able to execute $query." . mysqli_error($con);
			header("location: add_flight_details.php?msg=failed");
		}
		mysqli_close($con);
	} else {
		echo "Submit request not received";
	}
	?>
</body>

</html>