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
	</div>
	<form action="admin_view_booked_tickets_form_handler.php" method="post">
		<h2>VIEW LIST OF BOOKED TICKETS FOR A FLIGHT</h2>
		<div>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the Flight No.</td>
					<td class="fix_table">Enter the Departure Date</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="flight_no" required></td>
					<td class="fix_table"><input type="date" name="departure_date" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Submit" name="Submit">
		</div>
	</form>
</body>

</html>