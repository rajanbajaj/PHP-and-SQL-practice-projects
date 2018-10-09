<?php
session_start();
if(!isset($_COOKIE['user_id'])) {
	if (isset($_POST['submit'])) {
		require_once('connectvars.php');
		$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
		or die('cannot connect database');

		$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$pw = mysqli_real_escape_string($dbc, trim($_POST['password']));
		
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$query = "SELECT user_id, username FROM mis_match WHERE username= '$username' AND password = SHA('$pw')";
			$data = mysqli_query($dbc, $query)
			or die('cannot make query');

			if (mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_array($data);
				$_SESSION['username'] = $row['username'];
				$_SESSION['user_id'] = $row['user_id'];
				setcookie('user_id',$row['user_id'],time() + (60*60*24*30));
				setcookie('username',$row['username'], time() + (60*60*24*30));
				mysqli_close($dbc);
				$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
				header('Location:'.$url);
			}
			else{
				echo 'Enter a valid username and password';
			}
		}
		else{
			echo 'Enter the entries';
		}
	}		
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mismatch - Login</title>
</head>
<body>
<?php
$pagetitle = 'Login';
require_once('header.php');
require_once('navmenu.php');
?>
<?php
if(empty($_COOKIE['user_id'])){
?>
<form method="post" action="login.php">
	<label for="username">Username</label>
	<input type="text" name="username" id="username"><br/>
	<label for="password">Password</label>
	<input type="password" name="password" id="password"><br/>
	<input type="submit" name="submit" id="submit">
</form>
<?php
}
else{
	echo 'You are logged in as'.' '.$_COOKIE['username'];
}
?>
</body>
</html>