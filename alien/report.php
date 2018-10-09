<!DOCTYPE html>
<html>
<head>
	<title>Alien abduction</title>
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
$dbc = mysqli_connect('localhost', 'root' , Null ,'aliendatabase')
or die('Error in connecting to server');
$fn = $_POST['firstname'];
$ln = $_POST['lastname'];

$query = "INSERT INTO alien (first_name,last_name) VALUES ('$fn','$ln')";

$result = mysqli_query($dbc, $query)
or die('Database connection failed');
echo "Your name \"$fn $ln\" is successfully added in the database!";
mysqli_close($dbc);
?>
<a href="alienAbduction.html">Return home</a>
</body>
</html>
