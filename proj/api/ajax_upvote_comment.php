<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/comment.php');
		include_once('../database/user.php');

		$user = getCurrentUser();

		$user_id = $user['id'];
		$comment_id = trim(strip_tags($_GET['id']));
		$date = date('Y-m-d H:i:s');

		$userAlreadyUpvoted = hasUserAlreadyUpvotedComment($user_id, $comment_id);

		$result = deleteUserCommentVote(
			$user_id,
			$comment_id
		);

		if(!$userAlreadyUpvoted) {

			$vote_id = upvoteComment(
				$user_id,
				$comment_id,
				$date
			);

		}

		die(json_encode($result));
	}

	die(header('Location: ../index.php'));

	
?>