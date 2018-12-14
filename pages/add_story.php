<?php

	include_once('../config/init.php');

	include_once('../templates/header.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/user.php');

		$user = getCurrentUser();

		include_once('../templates/add_story.php');
	}

	include_once('../templates/footer.php');
	
?>
