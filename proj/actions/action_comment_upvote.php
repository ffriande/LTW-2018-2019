<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/comment.php');
		include_once('../database/user.php');

		$user = getCurrentUser();

		$user_id = $user['id'];
		$comment_id = trim(strip_tags($_GET['id']));
		$story_id = trim(strip_tags($_GET['story_id']));
		$date = date('Y-m-d H:i:s');

		$vote_id = upvoteComment(
		    $user_id,
		    $comment_id,
		    $date
		 );

		

		die(header('Location: ../pages/story.php?id='.$story_id));
	}

	die(header('Location: ../index.php'));

	
?>