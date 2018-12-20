<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/story.php');
		include_once('../database/user.php');

		$user = getCurrentUser();

		$user_id = $user['id'];
		$story_id = trim(strip_tags($_GET['id']));
		$date = date('Y-m-d H:i:s');

		
		$userAlreadyUpvoted = hasUserAlreadyUpvotedStory($user_id, $story_id);
		
		if ($userAlreadyUpvoted) {
			$result = deleteUserStoryVote(
				$user_id,
				$story_id
			);
		}
		
		if(!$userAlreadyUpvoted) {
			$vote_id = upvoteStory(
				$user_id,
				$story_id,
				$date
			);

		}

		die();
	}

	die(header('Location: ../index.php'));
	
?>