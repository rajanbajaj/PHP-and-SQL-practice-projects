<!DOCTYPE html>
<html>
<head>
	<title>Mismatch</title>
</head>
<body>
</body>
<?php
require_once('start_session.php');
$pagetitle = 'Home';
require_once('header.php');
require_once('navmenu.php');

require_once('connectvars.php');
$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
or die('Unable to connect database server');
$query = "SELECT username,user_id FROM mis_match";

$result = mysqli_query($dbc, $query)
or die('Unamble to make query');
echo '<h4>Recently joined</h4>';
if(isset($_SESSION['user_id'])){
	while ($row = mysqli_fetch_array($result)) {
		if ($row['user_id'] != $_SESSION['user_id']) {
		echo '*<a href="profile.php?user_id='.$row['user_id'].'">'.$row['username'].'</a><br/>';
		
		}
	}
}
else{
	while ($row = mysqli_fetch_array($result)) {
		echo '*'.$row['username'].'<br/>';
	}
}
?>
</body>
</html>