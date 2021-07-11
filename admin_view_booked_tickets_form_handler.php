<?php
session_start();
?>
<html>

<head>
	<title>
		View Booked Tickets
	</title>

	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<div>
		<ul>
			<li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li><a href="admin_view_booked_tickets.php"> View List of Booked Tickets for a Flight</a></li>
			<li><a href="add_flight_details.php"> Add Flight Schedule Details</a></li>
			<li><a href="delete_flight_details.php"> Delete Flight Schedule Details</a></li>
			<li><a href="login_page.php"> Logout</a></li>
		</ul>
	</div>
	<h2>LIST OF BOOKED TICKETS FOR THE FLIGHT</h2>
	<?php
	if (isset($_POST['Submit'])) {


		$flight_no = $_POST['flight_no'];


		$departure_date = $_POST['departure_date'];


		if (empty($data_missing)) {
			require_once('connect.php');
			$query = "SELECT pnr,date_of_reservation,class,no_of_passengers,customer_id FROM Ticket_Details where flight_no='$flight_no' and journey_date='$departure_date'";
			$result = mysqli_query($con, $query);
			$count = mysqli_num_rows($result);
			if ($count == 0) {
				echo "<h3>No booked tickets information is available!</h3>";
			} else {
				echo "<table cellpadding=\"10\"";
				echo "<tr><th>PNR</th>
						<th>Date of Reservation</th>
						<th>Class</th>
						<th>No. of Passengers</th>
						<th>Customer ID</th>
						</tr>";
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>
							<td>" . $row['pnr'] . "</td>
							<td>" . $row['date_of_reservation'] . "</td>
							<td>" . $row['class'] . "</td>
							<td>" . $row['no_of_passengers'] . "</td>
							<td>" . $row['customer_id'] . "</td>
        					</tr>";
				}
				echo "</table> <br>";
			}
			mysqli_close($con);
		} else {
			echo "The following data fields were empty! <br>";
			foreach ($data_missing as $missing) {
				echo $missing . "<br>";
			}
		}
	} else {
		echo "Submit request not received";
	}
	?>
</body>

</html>