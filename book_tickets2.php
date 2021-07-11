<?php
session_start();
?>
<html>

<head>
    <title>
        Enter Travel/Ticket Details
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
    <?php
    $no_of_pass = $_SESSION['no_of_pass'];
    $class = $_SESSION['class'];
    $count = $_SESSION['count'];
    $flight_no = $_POST['select_flight'];
    $_SESSION['flight_no'] = $flight_no;
    //$pass_name=array();
    echo "<h2>ADD PASSENGERS DETAILS</h2>";
    echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
    while ($count <= $no_of_pass) {
        echo "<p><strong>PASSENGER " . $count . "<strong></p>";
        echo "<table cellpadding=\"0\">";
        echo "<tr>";
        echo "<td class=\"fix_table_short\">Passenger's Name</td>";
        echo "<td class=\"fix_table_short\">Passenger's Age</td>";
        echo "<td class=\"fix_table_short\">Passenger's Gender</td>";
        echo "<td class=\"fix_table_short\">Passenger's Inflight Meal</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
        echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
        echo "<td class=\"fix_table_short\">";
        echo "<select name=\"pass_gender[]\">";
        echo "<option value=\"male\">Male</option>";
        echo "<option value=\"female\">Female</option>";
        echo "<option value=\"other\">Other</option>";
        echo "</select>";
        echo "</td>";
        echo "<td class=\"fix_table_short\">";
        echo "<select name=\"pass_meal[]\">";
        echo "<option value=\"yes\">Yes</option>";
        echo "<option value=\"no\">No</option>";
        echo "</select>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<br><hr>";
        $count = $count + 1;
    }

    echo "</table>";
    echo "<br><br>";
    echo "<input type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">";
    echo "</form>";
    ?>

</body>

</html>