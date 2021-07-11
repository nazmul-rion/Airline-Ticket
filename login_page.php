<?php
session_start();
?>
<html>

<head>
	<title>
		Account Login
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<div>
	<ul>
		<li><a href="login_page.php"> Home</a></li>
		<li><a href="login_page.php">Book Tickets</a></li>
		<li><a href="login_page.php">Login</a></li>
	</ul>
</div>
<br>
<br>
<br>
<form class="float_form" style="padding-left: 40px" action="login_handler.php" method="POST">
	<fieldset>
		<legend>Login Details:-</legend>
		<strong>Username:</strong><br>
		<input type="text" name="username" placeholder="Enter your username" required><br><br>
		<strong>Password:</strong><br>
		<input type="password" name="password" placeholder="Enter your password" required><br><br>
		<br>
		<?php
		if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
			echo "<br>
						<strong style='color:red'>Invalid Username/Password</strong>
						<br><br>";
		}
		?>
		<input type="submit" name="Login" value="Login">
	</fieldset>
	<br>
	<a href="newuser.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Create New User Account?</a>
</form>
</body>

</html>