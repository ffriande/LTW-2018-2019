<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/story.php');
		include_once('../database/user.php');

		$user = getCurrentUser();

		$user_id = $user['id'];
		$story_id = trim(strip_tags($_GET['id']));
		$date = date('Y-m-d H:i:s');

		$userAlreadyDownvoted = hasUserAlreadyDownvotedStory($user_id, $story_id);
		
		$result = deleteUserStoryVote(
			$user_id,
			$story_id
		);

		if(!$userAlreadyDownvoted) {

			$vote_id = downvoteStory(
			    $user_id,
			    $story_id,
			    $date
			 );
		}


		die();
	}

	die(header('Location: ../index.php'));

	
?>