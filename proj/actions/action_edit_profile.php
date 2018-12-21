<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {
		
		include_once('../database/user.php');

		$password = trim(strip_tags($_POST['password']));
		$passwordConfirm = trim(strip_tags($_POST['passwordConfirm']));

		// Don't allow certain characters
		$fail=0;
		if ( !preg_match ("/^[a-zA-Z0-9]+$/", $password	)) {
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password can only contain letters and numbers!');
			$fail=1;
		}
		if($password != $passwordConfirm) { 
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Password confirmation must be equal to password!');
			$fail=1;
		}
		if($fail==1)		
			die(header('Location: ../pages/profile.php'));
			
		try {
			editCurrentUser(
				$password
			);
			
			die(header('Location: ../actions/action_logout.php'));  
		} catch (PDOException $e) {
			
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed edit profile!');
			die(header('Location: ../pages/profile.php'));
		}


	}

	die(header('Location: ../pages/login.php'));
?>
