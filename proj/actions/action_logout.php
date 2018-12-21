<?php
	include_once('../config/session.php');
	
	session_destroy();

	session_start();

	die(header('Location: ../pages/login.php'));

?>
