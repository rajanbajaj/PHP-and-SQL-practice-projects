<!DOCTYPE html>
<html>
<head>
	<title>Login Action Page</title>
</head>
<body>
	<nav>
    <ul>
      <li><a href = "index.html">Home</a></li>
      <li><a href = "login.php">Login</a></li>
      <li><a href = "remove.php">Remove</a></li>
      <li><a href = "sendmail.html">Send Mail</a></li>
    </ul>
  </nav>
<?php
$form = false;
$first_name = NULL;
$last_name = NULL;
$email = NULL;
if(isset($_POST['submit'])){
$GLOBALS['first_name'] = $_POST['first_name'];
$GLOBALS['last_name'] = $_POST['last_name'];
$GLOBALS['email'] = $_POST['email'];
if ((!empty($GLOBALS['first_name']))&&(!empty($GLOBALS['last_name']))&&(!empty($GLOBALS['email']))) {
	$dbc = mysqli_connect('localhost','root', NULL, 'aliendatabase')
	or die('Unable to connect to mySQL server.');

	$query = "INSERT INTO store(first_name,last_name,email) VALUES ('$first_name','$last_name','$email')";

	$result = mysqli_query($dbc, $query)
	or die('Cannot make query!');
	echo "Login Successfull!";
	mysqli_close($dbc);
}
else {
	echo 'COMPLETE ENTRIES';
	$form = true;
}
}
else {
	$form = true;
}

if ($form) {
	?>
	<form method="post" action= "<?php echo $_SERVER['PHP_SELF']; ?>" >
		<label for="first_name">first name</label>
		<input type="text" name="first_name" id="first_name" value="<?php echo $first_name ?> ">
		<br>

		<label for="last_name">last name</label>
		<input type="text" name="last_name" id="last_name" value="<?php echo $last_name ?>">
		<br>

		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="<?php echo $email ?>">
		<input type="submit" name="submit" value="Login">
	</form>
<?php
}
?>
</body>
</html>
