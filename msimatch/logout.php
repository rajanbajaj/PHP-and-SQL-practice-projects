<?php
session_start();
if(isset($_SESSION['user_id'])){
$_SESSION = array();

	if ($_COOKIE[session_name()]) {
		setcookie(session_name(), '', time() - 3600);
	}
	session_destroy();
}
setcookie('username', '', time() - 3600);
setcookie('user_id', '', time() - 3600);

$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
header('Location:'.$url);
?>