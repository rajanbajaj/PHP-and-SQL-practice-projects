<!DOCTYPE html>
<html>
<head>
	<title>Send Action Page</title>
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
	$dbc = mysqli_connect('localhost', 'root', NULL, 'aliendatabase')
	or die('Server connection error');
	$subject = $_POST['subject'];
	$msg = $_POST['message'];

	$query = "SELECT * FROM store";

	$result = mysqli_query($dbc, $query)
	or die('Query error.');

	while ($row = mysqli_fetch_array($result)) {
		echo $row['first_name'].$row['last_name'].$row['email'];
		echo '<br>';
	}
	mysqli_close($dbc);
?>
</body>
</html>
