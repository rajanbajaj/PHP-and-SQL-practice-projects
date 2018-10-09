<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
<?php
$pagetitle = 'Signup';
require_once('header.php');
require_once('navmenu.php');
?>
<form method="post" action="signup.php">
	<label for="username">Username</label>
	<input type="text" name="username" id="username"><br/>
	<label for="password1">Password</label>
	<input type="password" name="password1" id="passwprd1"><br/>
	<label for="password2">Confirm Password</label>
	<input type="password" name="password2" id="passwprd2"><br/>
	<input type="submit" name="submit" id="submit" value="Signup">
</form>
<?php
	if (isset($_POST['submit'])) {
		require_once('connectvars.php');
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
		OR die('server not connected');
		$query = "SELECT username FROM mis_match WHERE username = '$username'" ;
		$result = mysqli_query($dbc,$query)
	    or die('Cannot make a query 1');
		if (mysqli_num_rows($result) == 0) {
			$query = "INSERT INTO mis_match (username, password, join_date) VALUES('$username', SHA('$password1'), NOW())";
			$result = mysqli_query($dbc, $query)
			or die('cannot make query 2');
			echo 'login Successful!<br/>';
		}
		else{
			echo 'username already exist <br/>';
		}
		mysqli_close($dbc);
	}
?>
</body>
</html>