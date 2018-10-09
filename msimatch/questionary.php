<?php
	require_once('start_session.php');
	$pagetitle = 'Questionnaire';
	require_once('header.php');
	require_once('navmenu.php');
	if(!isset($_SESSION['user_id'])) {
		echo 'You are not logged in. Please login to fill the Questionnaire';
		exit();
	}

	require_once('connectvars.php');
	$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
	or die('cannot connect to the database server');

	$query = "SELECT * FROM mis_match_response WHERE user_id = '".$_SESSION['user_id']."'";
	$result = mysqli_query($dbc, $query)
	or die('cannot make query');
	if (mysqli_num_rows($result) == 0) {
		$query = "SELECT topic_id FROM mis_match_topics ORDER BY category, topic_id";
		$result = mysqli_query($dbc, $query);
		$topicId = array();
		while($row = mysqli_fetch_array($result)){
			array_push($topicId, $row['topic_id']);
		}

		foreach ($topicId as $topic_id) {
			$query = "INSERT INTO mis_match_response (user_id, topic_id) VALUES ('".$_SESSION['user_id']."','".$topic_id."')";
		 	mysqli_query($dbc, $query)
		 	or die('cannot query');
		}
	}
	if(isset($_POST['submit'])) {
		foreach ($_POST as $response_id => $response) {
			$query = "UPDATE mis_match_response SET response = '$response' WHERE response_id = '$response_id'";
			mysqli_query($dbc, $query)
			or die('Cannot update');
		}
		echo '<p>your response have been saved.</p>';
	}

	//grab data
	$query = "SELECT response_id, response, topic_id FROM mis_match_response WHERE user_id ='".$_SESSION['user_id']."'";
	$result = mysqli_query($dbc, $query)
	or die('query1 cannot be completed');
	$responses = array();

	while($row = mysqli_fetch_array($result)) {
		$query2 = "SELECT name, category FROM mis_match_topics WHERE topic_id = '".$row['topic_id']."'";
		$result2 = mysqli_query($dbc, $query2)
		or die('query2 cannot be completed');
		if (mysqli_num_rows($result2) == 1) {
			//echo 'you enetere if <br/>';
			$row2 = mysqli_fetch_array($result2);
			$row['topic_name'] = $row2['name'];
			$row['category_name'] = $row2['category'];
			array_push($responses, $row);
		}
	}
	mysqli_close($dbc);

	// Generate the questionnaire form by looping through the response array
echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
echo '<p>How do you feel about each topic?</p>';
$category = $responses[0]['category_name'];
echo '<fieldset><legend>' . $responses[0]['category_name'] . '</legend>';
foreach ($responses as $response) {
// Only start a new fieldset if the category has changed
if ($category != $response['category_name']) {
$category = $response['category_name'];
echo '</fieldset><fieldset><legend>' . $response['category_name'] . '</legend>';
}
// Display the topic form field
echo '<label ' . ($response['response'] == NULL ? 'class="error"' : '') . ' for="' .
$response['response_id'] . '">' . $response['topic_name'] . ':</label>';
echo '<input type="radio" id="' . $response['response_id'] . '" name="' .
$response['response_id'] . '" value="1" ' .
($response['response'] == 1 ? 'checked="checked"' : '') . ' />Love ';
echo '<input type="radio" id="' . $response['response_id'] . '" name="' .
$response['response_id'] . '" value="2" ' .
($response['response'] == 2 ? 'checked="checked"' : '') . ' />Hate<br />';
}
echo '</fieldset>';
echo '<input type="submit" value="Save Questionnaire" name="submit" />';
echo '</form>';
?>