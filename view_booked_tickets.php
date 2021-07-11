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
			<li><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li><a href="book_tickets.php"> Book Flight Tickets</a></li>
			<li><a href="view_booked_tickets.php"> View Booked Flight Tickets</a></li>>
			<li><a href="login_page.php"> Logout</a></li>
		</ul>
	</div>
	<h2>VIEW BOOKED FLIGHT TICKETS</h2>
	<h3 class='set_nice_size'>
		<center><u>Upcoming Trips</u></center>
	</h3>
	<?php
	$todays_date = date('Y-m-d');
	$thirty_days_before_date = date_create(date('Y-m-d'));
	date_sub($thirty_days_before_date, date_interval_create_from_date_string("30 days"));
	$thirty_days_before_date = date_format($thirty_days_before_date, "Y-m-d");

	$customer_id = $_SESSION['login_user'];
	require_once('connect.php');
	$query = "SELECT pnr,date_of_reservation,flight_no,journey_date,class,no_of_passengers FROM Ticket_Details where customer_id='$customer_id' AND journey_date>='$todays_date' ORDER BY  journey_date";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		echo "<h3><center>No upcoming trips!</center></h3>";
	} else {

		echo "<table cellpadding=\"10\"";
		echo "<tr><th>PNR</th>
				<th>Date of Reservation</th>
				<th>Flight No.</th>
				<th>Journey Date</th>
				<th>Class</th>
				<th>No. of Passengers</th>
				</tr>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>
        			<td>" . $row['pnr'] . "</td>
        			<td>" . $row['date_of_reservation'] . "</td>
					<td>" . $row['flight_no'] . "</td>
					<td>" . $row['journey_date'] . "</td>
					<td>" . $row['class'] . "</td>
					<td>" . $row['no_of_passengers'] . "</td>
        			</tr>";
		}
		echo "</table> <br>";
	}
	echo "<br><h3 class=\"set_nice_size\"><center><u>Completed Trips</u></center></h3>";

	$query = "SELECT pnr,date_of_reservation,flight_no,journey_date,class,no_of_passengers FROM Ticket_Details where customer_id='$customer_id' and journey_date<'$todays_date' and journey_date>='$thirty_days_before_date' ORDER BY  journey_date";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		echo "<h3><center>No trips completed in the past 30 days!</center></h3>";
	} else {
		echo "<table cellpadding=\"10\"";
		echo "<tr><th>PNR</th>
				<th>Date of Reservation</th>
				<th>Flight No.</th>
				<th>Journey Date</th>
				<th>Class</th>
				<th>No. of Passengers</th>
				</tr>";
		while (mysqli_stmt_fetch($stmt)) {
			echo "<tr>
			<td>" . $row['pnr'] . "</td>
			<td>" . $row['date_of_reservation'] . "</td>
			<td>" . $row['flight_no'] . "</td>
			<td>" . $row['journey_date'] . "</td>
			<td>" . $row['class'] . "</td>
			<td>" . $row['no_of_passengers'] . "</td>
        			</tr>";
		}
		echo "</table> <br>";
	}
	mysqli_close($con);
	?>
</body>

</html>