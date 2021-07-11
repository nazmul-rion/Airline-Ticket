<?php
session_start();
?>
<html>

<head>
	<title>
		Add Flight Schedule Details
	</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div>
		<ul>
			<li><a href="admin_homepage.php"> Home</a></li>
			<li><a href="admin_view_booked_tickets.php"> View List of Booked Tickets for a Flight</a></li>
			<li><a href="add_flight_details.php"> Add Flight Schedule Details</a></li>
			<li><a href="delete_flight_details.php"> Delete Flight Schedule Details</a></li>
			<li><a href="login_page.php"> Logout</a></li>
		</ul>
	</div>
	<form action="add_flight_details_form_handler.php" method="post">
		<h2>ENTER THE FLIGHT SCHEDULE DETAILS</h2>
		<?php
		if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
			echo "<strong style='color: green'>The Flight Schedule has been successfully added.</strong>
						<br>
						<br>";
		} else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
			echo "<strong style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
						<br>
						<br>";
		}
		?>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Flight Number</td>
			</tr>
			<tr>
				<td class="fix_table"><input type="text" name="flight_no" required></td>
			</tr>
		</table>
		<br>
		<hr>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Origin</td>
				<td class="fix_table">Destination</td>
			</tr>
			<tr>
				<td class="fix_table"><input type="text" name="origin" required></td>
				<td class="fix_table"><input type="text" name="destination" required></td>
			</tr>
		</table>
		<br>
		<hr>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Departure Date</td>
				<td class="fix_table">Arrival Date</td>
			</tr>
			<tr>
				<td class="fix_table"><input type="date" name="dep_date" required></td>
				<td class="fix_table"><input type="date" name="arr_date" required></td>
			</tr>
		</table>
		<br>
		<hr>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Departure Time</td>
				<td class="fix_table">Arrival Time</td>
			</tr>
			<tr>
				<td class="fix_table"><input type="time" name="dep_time" required></td>
				<td class="fix_table"><input type="time" name="arr_time" required></td>
			</tr>
		</table>
		<br>
		<hr>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Number of Seats in Economy Class</td>
				<td class="fix_table">Number of Seats in Business Class</td>
			</tr>
			<tr>
				<td class="fix_table"><input type="number" name="seats_eco" required></td>
				<td class="fix_table"><input type="number"" name=" seats_bus" required></td>
			</tr>
		</table>
		<br>
		<hr>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Ticket Price(Economy Class)</td>
				<td class="fix_table">Ticket Price(Business Class)</td>
			</tr>
		</table>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">
					<input type="number" name="price_eco" required>
				</td>
				<td class="fix_table">
					<input type="number" name="price_bus" required>
				</td>
			</tr>
		</table>
		<br>
		<hr>
		<input type="submit" value="Submit" name="Submit">
	</form>

</body>

</html>