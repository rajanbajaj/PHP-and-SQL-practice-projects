<?php
	require_once('authentication.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approval Page</title>
</head>
<body>
<?php
	$id = $_GET['id'];
	$name = $_GET['name'];
	$score = $_GET['score'];
	$screen_shot = $_GET['screen_shot'];
	require_once('connect.php');
	$query = "UPDATE score SET approved = 1 WHERE id = $id";
	mysqli_query( $dbc, $query)
	or die('cannot make query!');

	echo 'id: '.$id.' with name: '.$name.' and score: '.$score.' is approved. <br/>';
	mysqli_close($dbc);
?>
<a href="admin.php">Go back to admin page.</a>
</body>
</html>