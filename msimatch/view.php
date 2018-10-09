<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
</head>
<body>
<?php

require_once('start_session.php');
define('MM_UPLOADPATH', 'images/');
$pagetitle = 'View Profile';
require_once('header.php');
require_once('navmenu.php');
if(isset($_SESSION['user_id'])){
	require_once('connectvars.php');
	$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
	or die('Failed to connect database server');
	$query = "SELECT * FROM mis_match WHERE user_id = '".$_SESSION['user_id']."'";
	$result = mysqli_query($dbc, $query)
	or die('Failed to query');
	$row = mysqli_fetch_array($result);
	echo 'Name: '.$row['first_name'].' '.$row['last_name'].'<br/>';
	echo 'Gender: '.$row['gender'].'<br/>';
	echo 'City: '.$row['city'].'<br/>';
	echo 'State: '.$row['state'].'<br/>';
	echo 'Profile Picture <br/>';
	echo '<img src="'.MM_UPLOADPATH.$row['picture'].'"/>';
}
else{
	echo 'You must login first to se your profile';
}
?>
</body>
</html>