<?php
	require_once('authentication.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
</head>
<body>
<nav>
<a href="index.php">Home</a>
</nav>

<?php
require_once('connect.php');
$query = "SELECT * FROM score ORDER BY score DESC, date ASC";
$result = mysqli_query($dbc, $query)
or die('Cannot make query');

while ($row = mysqli_fetch_array($result)) {
	echo $row['name'].' '.$row['score'];
	echo '<a href = "removescore.php?id=' .$row['id']. '&amp;date=' .$row['date']. '&amp;name=' .$row['name']. '&amp;score=' .$row['score']. '&amp;screen_shot=' .$row['screen_shot']. '"> Remove </a><br/>';
	if($row['approved'] == 0){
	echo '<a href = "approved.php?id=' .$row['id']. '&amp;date=' .$row['date']. '&amp;name=' .$row['name']. '&amp;score=' .$row['score']. '&amp;screen_shot=' .$row['screen_shot']. '"> Approve </a><br />';
	}
}
?>
</body>
</html>