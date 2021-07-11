<?php
session_start();
?>
<html>

<head>
	<title>Delete Flight Schedule Details</title>
</head>

<body>
	<?php
	if (isset($_POST['Delete'])) {
		$data_missing = array();
		if (empty($_POST['flight_no'])) {
			$data_missing[] = 'Flight No.';
		} else {
			$flight_no = trim($_POST['flight_no']);
		}
		if (empty($_POST['departure_date'])) {
			$data_missing[] = 'Departure Date';
		} else {
			$departure_date = trim($_POST['departure_date']);
		}

		if (empty($data_missing)) {
			require_once('connect.php');
			$query = "DELETE FROM Flight_details WHERE flight_no='$flight_no' AND departure_date='$departure_date'";
			if (mysqli_query($con, $query)) {
				echo "Successfully Deleted";
				header("location: delete_flight_details.php?msg=success");
				mysqli_close($con);
			} else {
				echo "Submit Error";
				header("location: delete_flight_details.php?msg=failed");
			}
		} else {
			echo "The following data fields were empty! <br>";
			foreach ($data_missing as $missing) {
				echo $missing . "<br>";
			}
		}
	} else {
		echo "Delete request not received";
	}
	?>
</body>

</html>