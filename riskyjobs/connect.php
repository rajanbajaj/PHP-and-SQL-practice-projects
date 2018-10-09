<?php
require_once('connectvars.php');
	$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PW, $DB)
	or die('Cannot connect to riskyjobs');
	?>