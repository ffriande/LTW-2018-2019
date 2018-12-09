<?php
	include_once('../config/init.php');
	include_once('../database/user.php');

	$username = trim(strip_tags($_POST['username']));
	$password = $_POST['password'];  
	$passwordConfirm = $_POST['passwordConfirm'];  


	if($password == $passwordConfirm) {

		createUser($username, $password, $passwordConfirm);

	}
	
	header('Location: ../pages/login.php');  

?>
