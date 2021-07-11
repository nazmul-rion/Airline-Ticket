<?php
session_start();
?>
<html>

<head>
	<title>
		Delete Flight Schedule Details
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
	<form action="delete_flight_details_form_handler.php" method="post">
		<h2>ENTER THE FLIGHT SCHEDULE TO BE DELETED</h2>
		<div>
			<?php
			if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
				echo "<strong style='color:green; padding-left:20px;'>The Flight Schedule has been successfully deleted.</strong>
						<br>
						<br>";
			} else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
				echo "<strong style='color:red; padding-left:20px;'>*Invalid Flight No./Departure Date, please enter again.</strong>
						<br>
						<br>";
			}
			?>
			<table cellpadding="5" style="padding-left: 20px;">
				<tr>
					<td class="fix_table">Enter a valid Flight No.</td>
					<td class="fix_table">Enter the Departure Date</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="flight_no" required></td>
					<td class="fix_table"><input type="date" name="departure_date" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Delete" name="Delete">
		</div>
	</form>
</body>

</html>