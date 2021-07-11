<html>

<head>
    <title>Add New User</title>
</head>

<body>
    <?php
    if (isset($_POST['Submit'])) {
        include('connect.php');
        $user_name = $_POST['username'];
        $password = trim($_POST["pwd"]);
        $email_id = $_POST['email'];
        $name = $_POST['name'];
        $phone_no = $_POST['phone_no'];
        $address = $_POST['address'];
        include('connect.php');
        $query = "INSERT INTO Customer (customer_id,pwd,name,email,phone_no,address) VALUES ('$user_name', '$password', '$name', '$email_id', '$phone_no', '$address')";
        if (mysqli_query($con, $query)) {
            header("location:newuser.php?msg=success , ss = $password");
        } else {
            echo "Submit Error";
        }
        mysqli_close($con);
    } else {
        echo "Submit request not received";
    }
    ?>
</body>

</html>