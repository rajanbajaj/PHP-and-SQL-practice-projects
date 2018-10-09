<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>
<?php
define('MM_UPLOADPATH', 'images/');
require_once('start_session.php');
$pagetitle = 'Edit Profile';
require_once('header.php');
require_once('navmenu.php');

if(isset($_SESSION['user_id'])){
	if (isset($_POST['submit'])) {
		require_once('connectvars.php');
		$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
		or die('Unable to connect database server');

		$query = "UPDATE mis_match SET first_name ='".$_POST['first_name']."', last_name='".$_POST['last_name']."', gender = '".$_POST['gender']."', city='".$_POST['city']."', state='".$_POST['state']."', picture='".$_FILES['profile_picture']['name']."' WHERE user_id ='". $_SESSION['user_id']."'";
		$result = mysqli_query($dbc, $query)
		or die('cannot make query');
		if(isset($_FILES['profile_picture'])){
			$target = MM_UPLOADPATH.$_FILES['profile_picture']['name'];
			move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);
		}
		echo 'Successfully updated your profile.';
	}
?>
<form method="post" action="edit.php" enctype="multipart/form-data">
	<label for="first_name">First Name</label>
	<input type="text" name="first_name" id="first_name"><br/>
	<label for="last_name">Last Name</label>
	<input type="text" name="last_name" id="last_name"><br/>
	
	<label for="gender">Gender</label><br/>
	M<input type="radio" name="gender"  value="M" id="gender">
	F<input type="radio" name="gender" value="F" id="gender">
	Other<input type="radio" name="gender" value="O" id="gender"><br/>

	<label for="city">City</label>
	<input type="text" name="city" id="city"><br/>

	<label for="state">State</label>
	<input type="text" name="state" id="state"><br/>

	<label for="profile_picture">Profile Picture</label>
	<input type="file" name="profile_picture" id="profile_picture"><br/>
	<input type="submit" name="submit" id="submit">
</form>

<?php
}
else{
	echo 'You must login first to see this page';	
}
?>
</body>
</html>