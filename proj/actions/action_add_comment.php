<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/comment.php');
		include_once('../database/user.php');

		$user = getCurrentUser();

		$story_id = trim(strip_tags($_POST['story']));
		$user_id = $user['id'];
		$description = trim(strip_tags($_POST['comment']));
		$date = date('Y-m-d H:i:s');
		$karma = 0;
		
		$comment_id = createComment(
			$story_id,
			$user_id,
			$description,
			$date,
			$karma
		);
		
		die(header('Location: ../pages/story.php?id='.$story_id));
	}

	die(header('Location: ../index.php'));

	
?>

