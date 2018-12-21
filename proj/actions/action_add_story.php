<?php
	include_once('../config/init.php');

	if(isset($_SESSION['username'])) {

		include_once('../database/user.php');
		include_once('../database/story.php');

		$user = getCurrentUser();

		$title = trim(strip_tags($_POST['title']));
		$description = trim(strip_tags($_POST['description']));
		$user_id = $user['id'];
		$date = date('Y-m-d H:i:s');


		try {

			$story_id = createStory(
				$title, 
				$description,
				$user_id,
				$date
			);

			$_SESSION['messages'][] = array('type' => 'success', 'content' => 'Story created!');

			die(header('Location: ../pages/story.php?id='.$story_id));
		} catch (PDOException $e) {

			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'Error on create story!');
			die(header('Location: ../pages/stories.php'));
		}


	}

	die(header('Location: ../index.php'));

	
?>
