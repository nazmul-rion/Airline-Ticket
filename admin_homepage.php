<?php
session_start();
?>
<html>

<head>
	<title>
		Welcome Administrator
	</title>
	<link rel="stylesheet" href="css/style.css" />
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
	<h2>Welcome Administrator!</h2>
</body>

</html>