<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Guitar Wars Score</title>
</head>
<body>
<nav>
	<a href="index.php">HOME</a>
	<a href="admin.php">Administrator</a>
</nav>
<?php
$form = 'false';
define('GW_UPLOADPATH', 'images/');
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$score = $_POST['score'];
	$screenshot = $_FILES['screenshot']['name'];
	
	$user_pass_phrase = sha1($_POST['captcha']);
if ($user_pass_phrase == $_SESSION['pass_phrase']) {
	
	if (!empty($name) && !empty($score) && !empty($screenshot)) {
		$target = GW_UPLOADPATH.$screenshot;
	if(move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
	$dbc = mysqli_connect('localhost', 'root', NULL, 'guitarwars')
	or die('Unamble to connect to the mySQL SERVER');
	
	$query = "INSERT INTO score(name, date, score, screen_shot,approved) VALUES ('$name', NOW(), '$score', '$screenshot', 0)";
	$result = mysqli_query($dbc, $query)
	or die('Cannot make a Query!'); 
	echo 'Success! <br />';
	mysqli_close($dbc);}}
	else {
		$form = 'true';
	}
}
else{
	echo 'Please enter varification pass phrase as shown.';
}	
if($form == 'true'){
	echo 'Fill the complete form. <br>';
}
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="3276800">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" <?php if($form == 'true') {echo 'value="'.$name.'"';} else{echo 'value=""';} ?>><br>
	<label for="scor">Score</label>
	<input type="text" name="score" id="score" <?php if($form == 'true') {echo 'value="'.$score.'"';}  else{echo 'value=""';} ?>><br>
	<input type="file" name="screenshot" id="screenshot" <?php if($form == 'true') {echo 'value="'.$screenshot.'"';}  else{echo 'value=""';} ?>><br/><br/>
	<label for="captcha">Verification</label><br/>
	<img src="captcha.php" alt="Verification pass-phrase"><br/>
	<input type="text" name="captcha" value="Enter the pass-phrase"/><br/>
	<input type="submit" name="submit" value="Add">
</form>
</body>
</html>