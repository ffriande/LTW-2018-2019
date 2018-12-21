<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/comment.php');
		include_once('../database/user.php');

		$user = getCurrentUser();

		$story_id = trim(strip_tags($_POST['story']));
		$user_id = $user['id'];
		$father_id = trim(strip_tags($_POST['father']));
		$description = trim(strip_tags($_POST['comment']));
		$date = date('Y-m-d H:i:s');
		$karma = 0;
		
		try {
			
			$comment_id = createReply(
				$story_id,
				$user_id,
				$description,
				$date,
				$karma,
				$father_id
			);

			$_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reply created!');

			die(header('Location: ../pages/story.php?id='.$story_id));

		} catch (PDOException $e) {

			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Error on create reply!');

			die(header('Location: ../pages/story.php?id='.$story_id));
		}
	}

	die(header('Location: ../index.php'));

	
?>

