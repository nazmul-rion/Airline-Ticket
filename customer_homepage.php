<?php
session_start();
// if($_SESSION['login_user']==null){
// 	header('location:home_page.php');
// }
?>
<html>

<head>
    <title>
        Welcome Customer
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
    echo "<h2>Welcome " . $_SESSION['login_user'] . "</h2>";
    ?>
</body>

</html>