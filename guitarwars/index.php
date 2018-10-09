<!DOCTYPE html>
<html>
<head>
	<title>Guitar Wars</title>
</head>
<body>
<nav>
	<a href="score.php">LOGIN</a>
	<a href="admin.php">Administrator</a>
</nav>
<?php
	define('GW_UPLOADPATH', 'images/');
	$dbc = mysqli_connect( 'localhost' , 'root' , NULL , 'guitarwars' )
	or die('Server connection failed');

	$query = "SELECT * FROM score ORDER BY score DESC, date ASC";

	$result = mysqli_query( $dbc , $query )
	or die('Cannot make query');

	while($row = mysqli_fetch_array($result)) {
		if($row['approved'] == 1){
		echo $row['name'].'<br />';
		echo $row['score'].'<br />';
		echo '<img src = "'.GW_UPLOADPATH.$row['screen_shot'].'" />';
		}
	}
?>
</body>
</html>