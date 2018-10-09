<?php
if(!isset($_SESSION['user_id'])){
	echo '<a href="login.php">Login</a> &#10084; ';
	echo '<a href="signup.php">Signup</a> &#10084; ';
}
else{
	echo '<a href="index.php">Home</a> &#10084; ';
	echo '<a href="view.php">View profile</a> &#10084;';
	echo '<a href="edit.php">Edit profile</a> &#10084;';
	echo '<a href="questionary.php">Questionnaire</a> &#10084;';
	echo '<a href="logout.php">Logout </a> &#10084;';
}
echo '<hr>';
?>