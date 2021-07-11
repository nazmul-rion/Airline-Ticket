<html>

<head>
	<title>Login Handler</title>
</head>

<body>
	<?php
	session_start();
	session_destroy();
	session_start();
	if (isset($_POST['Login'])) {
		$data_missing = array();
		if (empty($_POST['username'])) {
			$data_missing[] = 'Username';
		} else {
			$user_name = trim($_POST['username']);
		}
		if (empty($_POST['password'])) {
			$data_missing[] = 'Password';
		} else {
			$password = $_POST['password'];
		}


		if (empty($data_missing)) {
			if ($user_name == 'admin' && $password = 'admin') {
				echo "Logged in <br>";
				$_SESSION['login_user'] = $user_name;
				echo $_SESSION['login_user'] . " is logged in";
				header('location:admin_homepage.php');
			} else {
				require_once('connect.php');
				$query = "SELECT * FROM Customer where customer_id='$user_name' and pwd='$pass_word'";
				$result = mysqli_query($con, $query);
				$cnt = mysqli_num_rows($result);

				if ($cnt == 1) {
					echo "Logged in <br>";
					$_SESSION['login_user'] = $user_name;
					echo $_SESSION['login_user'] . " is logged in";
					header("location: customer_homepage.php");
				} else {
					echo "Login Error";
					session_destroy();
					header('location:login_page.php?msg=failed');
				}
				mysqli_close($con);
			}
		} else {
			echo "The following data fields were empty<br>";
			foreach ($data_missing as $missing) {
				echo $missing . "<br>";
			}
		}
	} else {
		echo "Submit request not received";
	}
	?>
</body>

</html>