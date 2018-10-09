<?php
	require_once('start_session.php');
	$pagetitle = 'Profile';
	require_once('header.php');
	require_once('navmenu.php');
	
	require_once('connectvars.php');
	$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
	or die('Cannot connect tp database server');
	$user_id = $_GET['user_id'];
	$query = "SELECT * FROM mis_match WHERE user_id = '".$user_id."'";

	$result = mysqli_query($dbc, $query)
	or die('cannot make query for profile information');
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['first_name'].' '.$row['last_name']; ?></title>
</head>
<body>
<?php
	echo 'Name ='.$row['first_name'].' '.$row['last_name'].'<br/>';
	echo 'Gender ='.$row['gender'].'<br/>';
	echo 'City ='.$row['city'].'<br/>';
	echo 'State ='.$row['state'].'<br/>';
	echo '<img src ="images/'.$row['picture'].'"<br/>';

?>
</body>
</html>