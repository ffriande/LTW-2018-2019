<?php
	include_once('../config/init.php');
	include_once('../config/session.php');
	include_once('../database/user.php');

	$username = trim(strip_tags($_POST['username']));
	$password = trim(strip_tags($_POST['password']));

	if (verifyUser($username, $password)) {

		$_SESSION['username'] = $username;

		die(header('Location: ../pages/stories.php'));
		
	} else {

		die(header('Location: ../pages/login.php'));

	}
?>
