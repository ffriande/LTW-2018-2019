<?php
	include_once('../config/init.php');
	include_once('../database/user.php');
	include_once('../config/session.php');

	$username = trim(strip_tags($_POST['username']));
	$password = $_POST['password'];  
	$passwordConfirm = $_POST['passwordConfirm'];  

		// Don't allow certain characters
		$fail=0;
		if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
			$fail=1;
		}
		if ( !preg_match ("/^[a-zA-Z0-9]+$/", $password	)) {
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password can only contain letters and numbers!');
			$fail=1;
		}
		if($password != $passwordConfirm) { 
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password confirmation must be equal to password!');
			$fail=1;
		}
		if($fail==1)		
			die(header('Location: ../pages/register.php'));
			
		try {
			createUser($username, $password, $passwordConfirm);
			die(header('Location: ../pages/login.php'));  
		} catch (PDOException $e) {
			die($e->getMessage());
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
			die(header('Location: ../pages/register.php'));
		}
?>
