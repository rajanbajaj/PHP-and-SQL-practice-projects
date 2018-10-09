<!DOCTYPE html>
<html>
<head>
	<title>Search For Job</title>
</head>
<body>
<?php
	$pagetitle = 'Search';
	require_once('header.php');
	require_once('navmenu.php');
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$clean_search = str_replace(',', ' ', $title);
		$temp_words = explode(' ', $title);
		$words = array();
		foreach ($temp_words as $word) {
			if(!empty($word)){
				$words[] = $word;
			}
		}
		$where_clause = '';
		foreach ($words as $word) {
			$where_list[] = "description LIKE '%$word%'	 " ;
		}
		$where_clause = implode('OR ', $where_list);
		$query = "SELECT * FROM riskyjobs WHERE ".$where_clause." ORDER BY title";
		//echo $query;
		require_once('connect.php');
		$result = mysqli_query($dbc, $query)
		or die('query');

		echo '<ul>';
		while ($row = mysqli_fetch_array($result)) {
			echo '<li>';
			echo '<h3>'.$row['title'].' '.$row['date_posted'].'</h3>';
			echo 'Description: '.substr($row['description'],0,100).'<br/>';
			echo 'City: '.$row['city'].'<br/>';
			echo 'State: '.$row['state'].'<br/>';
			echo 'zip: '.$row['zip'].'<br/>';
			echo 'Company: '.$row['company'].'<br/>';
			echo '</li>';
			}
		echo '</ul>';	
	}
?>

<form method="post" action="search.php">
	<input type="text" name="title" id="title">
	<input type="submit" name="submit">
</form>
</body>
</html>