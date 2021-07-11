<?php
session_start();
?>
<html>

<head>
    <title>Add Ticket Details</title>
</head>

<body>
    <?php

    if (isset($_POST['Submit'])) {
        $pnr = rand(1000000, 9999999);
        $date_of_res = date("Y-m-d");
        $flight_no = $_SESSION['flight_no'];
        $journey_date = $_SESSION['journey_date'];
        $class = $_SESSION['class'];
        $no_of_pass = $_SESSION['no_of_pass'];
        $total_no_of_meals = 0;
        $_SESSION['pnr'] = $pnr;

        $customer_id = $_SESSION['login_user'];

        include('connect.php');

        if ($_SESSION['class'] == 'economy') {
            $query = "SELECT price_economy FROM Flight_Details where flight_no='$flight_no' and departure_date='$journey_date'";
            $result = mysqli_query($con, $query);
        } else if ($_SESSION['class'] == 'business') {
            $query = "SELECT price_business FROM Flight_Details where flight_no='$flight_no' and departure_date='$journey_date'";
            $result = mysqli_query($con, $query);
        }

        $query = "INSERT INTO Ticket_Details (pnr,date_of_reservation,flight_no,journey_date,class,no_of_passengers,customer_id) VALUES ('$pnr', '$date_of_res', '$flight_no', '$journey_date',' $class', '$no_of_pass',  '$customer_id')";
        if (mysqli_query($con, $query)) {
            header("location: book_tickets.php?msg=success");
        } else {
            echo "Submit Error";
            echo mysqli_error($con);
        }
        mysqli_close($con);
    } else {
        echo "Submit request not received";
    }
    ?>
</body>

</html>