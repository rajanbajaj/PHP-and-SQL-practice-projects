<!DOCTYPE html>
<html>
<head>
	<title>Add Job</title>
</head>
<body>
<?php
$pagetitle = 'Add jobs';
require_once('header.php');
require_once('navmenu.php');
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$company = $_POST['company'];

	require_once('connect.php');

	$query = "INSERT INTO riskyjobs (title, description, city, state, zip, company, date_posted) VALUES ('$title', '$description', '$city', '$state', '$zip', '$company', NOW()	)";

	mysqli_query($dbc, $query)
	or die('cannot make Insert query');

	echo 'successfully inserted Job';
	mysqli_close($dbc);
}
?>
<form method="post" action="addjob.php">
	<label for="title">Title</label>
	<input type="text" name="title" id="title"><br/>
	<label for="Description">Description</label>
	<input type="text" name="description" id="description"><br/>
	<label for="city">City</label>
	<input type="text" name="city" id="city"><br/>
	<label for="state">State</label>
	<input type="text" name="state" id="state"><br/>
	<label for="zip">Zip</label>
	<input type="number" name="zip" id="zip"><br/>
	<label for="company">Company</label>
	<input type="text" name="company" id="company"><br/>
	<input type="submit" name="submit">
</form>
</body>
</html>