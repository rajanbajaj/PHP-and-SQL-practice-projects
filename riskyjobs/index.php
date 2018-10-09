<!DOCTYPE html>
<html>
<head>
	<title>Risky Jobs!</title>
</head>
<body>
<?php
$pagetitle = 'Add jobs';
require_once('header.php');
require_once('navmenu.php');
	require_once('connect.php');
	$query = "SELECT * FROM riskyjobs ORDER BY title";

	$result = mysqli_query($dbc, $query)
	or die('cannot query database');
echo '<ul>';
	while ($row = mysqli_fetch_array($result)) {
		echo '<li>';
		echo '<h3>'.$row['title'].' '.$row['date_posted'].'</h3>';
		echo 'Description: '.$row['description'].'<br/>';
		echo 'City: '.$row['city'].'<br/>';
		echo 'State: '.$row['state'].'<br/>';
		echo 'zip: '.$row['zip'].'<br/>';
		echo 'Company: '.$row['company'].'<br/>';
		echo '</li>';
	}
echo '</ul>';	
?>
</body>
</html>
