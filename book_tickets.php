<?php
session_start();
?>
<html>

<head>
	<title>
		View Available Flights
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
	<form action="view_flights_form_handler.php" method="post">
		<h2>SEARCH FOR AVAILABLE FLIGHTS</h2>

		<?php
		if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
			echo "<strong style='color: green'><h3>Successfully submitted.</h3></strong>
                            <br>
                            <br>";
		} else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
			echo "<strong style='color: red'><h3>Submitted Unsuccessful.</h3></strong>
                            <br>
                            <br>";
		}
		?>

		<table cellpadding="5">
			<tr>
				<td class="fix_table">Enter the Origin</td>
				<td class="fix_table">Enter the Destination</td>
			</tr>
			<tr>
				<td class="fix_table">
					<input list="origins" name="origin" placeholder="From" required>
					<datalist id="origins">
						<option value="bangalore">
					</datalist>
					<!-- <input type="text" name="origin" placeholder="From" required> -->
				</td>
				<td class="fix_table">
					<input list="destinations" name="destination" placeholder="To" required>
					<datalist id="destinations">
						<option value="mumbai">
						<option value="mysore">
						<option value="mangalore">
						<option value="chennai">
						<option value="hyderabad">
					</datalist>
					<!-- <input type="text" name="destination" placeholder="To" required> -->
				</td>
			</tr>
		</table>
		<br>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Enter the Departure Date</td>
				<td class="fix_table">Enter the No. of Passengers</td>
			</tr>
			<tr>
				<td class="fix_table"><input type="date" name="dep_date" min=<?php
																				$todays_date = date('Y-m-d');
																				echo $todays_date;
																				?> max=<?php
																						$max_date = date_create(date('Y-m-d'));
																						date_add($max_date, date_interval_create_from_date_string("90 days"));
																						echo date_format($max_date, "Y-m-d");
																						?> required></td>
				<td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5" required></td>
			</tr>
		</table>
		<br>
		<table cellpadding="5">
			<tr>
				<td class="fix_table">Enter the Class</td>
			</tr>
			<tr>
				<td class="fix_table">
					<select name="class">
						<option value="economy">Economy</option>
						<option value="business">Business</option>
					</select>
				</td>
			</tr>
		</table>
		<br>
		<input type="submit" value="Search for Available Flights" name="Search">
	</form>
</body>

</html>