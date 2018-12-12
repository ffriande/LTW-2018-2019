<?php
	function getAllStories() {
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM story ORDER BY `karma` DESC');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getStory($story_id) {
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM story WHERE id = ?');
		$stmt->execute(array($story_id));
		return $stmt->fetch();
	}

	function createStory(
		$title, 
		$description,
		$user_id,
		$date
	) {

		global $conn;

		$stmt = $conn->prepare('INSERT INTO story (`channel_id`, `user_id`, `title`, `description`, `date`, `karma`) VALUES  ( ?, ?, ?, ?, ?, ?)');
		
		$stmt->execute(array(NULL, $user_id, $title, $description, $date, 0));

		return $conn->lastInsertId();
	}

	function upvoteStory(
		$user_id,
		$story_id,
		$date
	)
	{
		global $conn;

		$stmt = $conn->prepare('INSERT INTO voteStory (`user_id`, `story_id`, `up_down`, `date`) VALUES  ( ?, ?, ?, ?)');
		
		$stmt->execute(array($user_id, $story_id, 1, $date));

		return $conn->lastInsertId();
	}

	function downvoteStory(
		$user_id,
		$story_id,
		$date
	)
	{
		global $conn;

		$stmt = $conn->prepare('INSERT INTO voteStory (`user_id`, `story_id`, `up_down`, `date`) VALUES  ( ?, ?, ?, ?)');
		
		$stmt->execute(array($user_id, $story_id, 0, $date));

		return $conn->lastInsertId();
	}
?>
