<!DOCTYPE html>
<html>
<head>
	<title>Action page</title>
</head>
<body>
<?php
	define('GW_UPLOADPATH', 'images/');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$score = $_POST['score'];
	$screen_shot = $_POST['screen_shot'];
	$confirm = $_POST['confirm'];
	if ($confirm == 'yes') {
		require_once('connect.php');
		$query = "DELETE FROM score WHERE id = $id LIMIT 1";

		mysqli_query( $dbc, $query)
		or die('Cannot make query!');
		@unlink(GW_UPLOADPATH.$screen_shot);

		echo 'Name: '.$name.' with score: '.$score.' is removed successfully';
	}
	else {
		echo 'Entry is not removed! <br />';
	}
?>
	<a href="admin.php">Go back to administrator page.</a>
</body>
</html>