<?php
	include_once('config/init.php');
	include_once('database/user.php');

	$username = trim(strip_tags($_POST['username']));
	$password = trim(strip_tags($_POST['password']));

	if (verifyUser($username, $password)) {
		
		$_SESSION['username'] = $username;
		header('Location: pages/stories.php');
		
	} else {

		header('Location: pages/stories.php');

	}
?>
