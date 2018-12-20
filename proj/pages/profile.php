<?php

	include_once('../config/init.php');
	include_once('../templates/header.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/profile.php');

		$usern = isset($_GET['profile']) ? $_GET['profile'] : $_SESSION['username'];

		$storiesKarma = getVotesStory($usern);

		$commentsKarma = getVotesComment($usern);

		$karma = $storiesKarma + $commentsKarma;

		$user_info = getUserInfo($usern);

		$stories = getUserStories($usern); 

		$comments = getUserComments($usern); 


		include_once('../templates/profile_template.php');
		
	}

	include_once('../templates/footer.php');
?>
