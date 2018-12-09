<?php
	include_once('../config/init.php');
	include_once('../database/user.php');

	$username = trim(strip_tags($_POST['username']));
	$password = trim(strip_tags($_POST['password']));
	$passwordConfirm = trim(strip_tags($_POST['password']));

	editUser($username, $password, $passwordConfirm);

	header('Location: ../pages/login.php');
?>
