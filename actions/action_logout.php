<?php
	include_once('../config/session.php');
	//var_dump($_SESSION);
	session_destroy();

	session_start();

	die(header('Location: ../pages/login.php'));

?>
