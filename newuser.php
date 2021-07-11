<html>

<head>
    <title>
        Create New User Account
    </title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <div>
        <ul>
            <li><a href="login_page.php"> Home</a></li>
            <li><a href="login_page.php"> Book Tickets</a></li>
            <li><a href="login_page.php"> Login</a></li>
        </ul>
    </div>
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
        echo "<strong style='color: green'>New User Created...</strong>
						<br>    
						<br>";
    } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
        echo "<strong style='color: red'>User Creation faild..!</strong>
						<br>
						<br>";
    }
    ?>
    <br>
    <form class="center_form" action="addnewuser.php" method="POST" id="new_user_from">
        <h2> CREATE NEW USER ACCOUNT</h2>
        <br>
        <table cellpadding='10'>
            <strong>ENTER LOGIN DETAILS</strong>
            <tr>
                <td>Enter a valid username </td>
                <td><input type="text" name="username" required><br><br></td>
            </tr>
            <br>
            <tr>
                <td>Enter your password </td>
                <td><input type="text" name="pwd" required><br><br></td>
            </tr>
            <tr>
                <td>Enter your email ID</td>
                <td><input type="text" name="email" required><br><br></td>
            </tr>
        </table>
        <br>
        <table cellpadding='10'>
            <strong>ENTER CUSTOMER'S PERSONAL DETAILS</strong>
            <tr>
                <td>Enter your name </td>
                <td><input type="text" name="name" required><br><br></td>
            </tr>
            <tr>
                <td>Enter your phone no.</td>
                <td><input type="text" name="phone_no" required><br><br></td>
            </tr>
            <tr>
                <td>Enter your address</td>
                <td><input type="text" name="address" required><br><br></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Submit" name="Submit">
        <br>
    </form>
</body>

</html>