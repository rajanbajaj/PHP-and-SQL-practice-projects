<?php
	require_once('authentication.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm Remove</title>
</head>
<body>
Do you want to remove following entry?
<?php
	$id = $_GET['id'];
	$name = $_GET['name'];
	$score = $_GET['score'];
	$screen_shot = $_GET['screen_shot'];
	$approved = $_GET['approved'];
	echo 'id = '.$id.'<br/>'.'name = '.$name.'<br/>'.'score = '.$score.'<br/>';
?>
<form method="post" action="action.php">
	<label for="yes">YES</label>
	<input type="radio" name="confirm" value="yes">
	<label for="no">NO</label>
	<input type="radio" name="confirm" value="no">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden" name="name" value="<?php echo $name;?>">
	<input type="hidden" name="score" value="<?php echo $score;?>">
	<input type="hidden" name="screen_shot" value="<?php echo $screen_shot;?>">
	<input type="hidden" name="approved" value="<?php echo $approved ?>">
	<input type="submit" name="submit" value="confirm">
</form>
</body>
</html>