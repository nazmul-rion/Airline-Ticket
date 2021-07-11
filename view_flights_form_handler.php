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
			<li><a href="customer_homepage.php">Home</a></li>
			<li><a href="book_tickets.php"> Book Flight Tickets</a></li>
			<li><a href="view_booked_tickets.php"> View Booked Flight Tickets</a></li>>
			<li><a href="login_page.php"> Logout</a></li>
		</ul>
	</div>
	<h2>AVAILABLE FLIGHTS</h2>
	<?php
	if (isset($_POST['Search'])) {
		$data_missing = array();
		if (empty($_POST['origin'])) {
			$data_missing[] = 'Origin';
		} else {
			$origin = $_POST['origin'];
		}
		if (empty($_POST['destination'])) {
			$data_missing[] = 'Destination';
		} else {
			$destination = $_POST['destination'];
		}

		if (empty($_POST['dep_date'])) {
			$data_missing[] = 'Departure Date';
		} else {
			$dep_date = trim($_POST['dep_date']);
		}
		if (empty($_POST['no_of_pass'])) {
			$data_missing[] = 'No. of Passengers';
		} else {
			$no_of_pass = trim($_POST['no_of_pass']);
		}

		if (empty($_POST['class'])) {
			$data_missing[] = 'Class';
		} else {
			$class = trim($_POST['class']);
		}

		if (empty($data_missing)) {
			$_SESSION['no_of_pass'] = $no_of_pass;
			$_SESSION['class'] = $class;
			$count = 1;
			$_SESSION['count'] = $count;
			$_SESSION['journey_date'] = $dep_date;
			require_once('connect.php');
			if ($class == "economy") {
				$query = "SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city='$origin' and to_city='$destination' and departure_date='$dep_date' and seats_economy>='$no_of_pass' ORDER BY  departure_time";
				$result = mysqli_query($con, $query);
				$count = mysqli_num_rows($result);
				if ($count == 0) {
					echo "<h3>No flights are available !</h3>";
				} else {
					echo "<form action=\"book_tickets2.php\" method=\"post\">";
					echo "<table cellpadding=\"10\"";
					echo "<tr><th>Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Economy)</th>
							<th>Select</th>
							</tr>";
					while ($row = mysqli_fetch_array($result)) {
						echo "<tr>
        						<td>" . $row['flight_no'] . "</td>
        						<td>" . $row['from_city'] . "</td>
								<td>" . $row['to_city'] . "</td>
								<td>" .  $row['departure_date'] . "</td>
								<td>" . $row['departure_time'] . "</td>
								<td>" . $row['arrival_date'] . "</td>
								<td>" . $row['arrival_time'] . "</td>
								<td>&#2547; " . $row['price_economy'] . "</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"" . $row['flight_no'] . "\"></td>
        						</tr>";
					}
					echo "</table> <br>";
					echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
					echo "</form>";
				}
			} else if ($class = "business") {
				$query = "SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city='$origin' and to_city='$destination' and departure_date='$dep_date' and seats_economy>='$no_of_pass' ORDER BY  departure_time";
				$result = mysqli_query($con, $query);
				$count = mysqli_num_rows($result);
				if ($count == 0) {
					echo "<h3>No flights are available !</h3>";
				} else {
					echo "<form action=\"book_tickets2.php\" method=\"post\">";
					echo "<table cellpadding=\"10\"";
					echo "<tr><th>Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Business)</th>
							<th>Select</th>
							</tr>";
					while ($row = mysqli_fetch_array($result)) {
						echo "<tr>
        						<td>" . $row['flight_no'] . "</td>
        						<td>" . $row['from_city'] . "</td>
								<td>" . $row['to_city'] . "</td>
								<td>" .  $row['departure_date'] . "</td>
								<td>" . $row['departure_time'] . "</td>
								<td>" . $row['arrival_date'] . "</td>
								<td>" . $row['arrival_time'] . "</td>
								<td>&#2547; " . $row['price_business'] . "</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"" . $row['flight_no'] . "\"></td>
        						</tr>";
					}
					echo "</table> <br>";
					echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
					echo "</form>";
				}
			}
			mysqli_close($con);
		} else {
			echo "The following data fields were empty! <br>";
			foreach ($data_missing as $missing) {
				echo $missing . "<br>";
			}
		}
	} else {
		echo "Search request not received";
	}
	?>
</body>

</html>