<!DOCTYPE html>
<html>
<head>
	<title>Remove action</title>
</head>
<body>
	<nav>
    <ul>
      <li><a href = "index.html">Home</a></li>
      <li><a href = "login.php">Login</a></li>
      <li><a href = "remove.php">Remove</a></li>
      <li><a href = "sendmail.html">Send Mail</a></li>
    </ul>
  </nav><br>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php
$dbc = mysqli_connect('localhost','root',NULL,'aliendatabase')
 or die('Unable to connect to the server');
$count = 0;
//deleting rows
if (isset($_POST['submit'])) {
foreach ($_POST['todelete'] as $delete_id) {
	$query = "DELETE FROM store	WHERE id = $delete_id";
	mysqli_query($dbc, $query)
	 or die('Unable to query');
	 $count++;
}
 echo "$count coustomers deleted.";
}
$query = "SELECT * FROM store";
$result = mysqli_query($dbc, $query)
 or die('Unable to query');

//	 echo '<form method ="post" action ="'.$_SERVER['PHP_SELF'].'">';
$c = 0;
 while ($row = mysqli_fetch_array($result)) {
	 echo '<input type="checkbox" value ="' .$row['id']. '" name="todelete[]" />';
	 echo $row['first_name'];
	 echo ' '.$row['last_name'];
	 echo '<br/>';
	 $c++;
 }
mysqli_close($dbc);
//displaying coustomers
?>

<input type="submit" name="submit" value="Delete" <?php if($c==0){echo 'hidden';} ?>>
</form>
</body>
</html>
