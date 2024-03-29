<?php
	function getAllStories($sort) {
		global $conn;
		switch($sort){
			case "mostK":
				$stmt = $conn->prepare("SELECT story.*, COUNT(comment.story_id) as nrComm, user.username as usrname FROM story left join comment on story.id=comment.story_id left join user on story.user_id=user.id group by story.id ORDER BY `karma` DESC");
				break;
			case "leastK":
				$stmt = $conn->prepare("SELECT story.*, COUNT(comment.story_id) as nrComm, user.username as usrname FROM story left join comment on story.id=comment.story_id left join user on story.user_id=user.id group by story.id ORDER BY `karma` ASC");
				break;
			case "recent":
				$stmt = $conn->prepare("SELECT story.*, COUNT(comment.story_id)as nrComm,  user.username as usrname FROM story left join comment on story.id=comment.story_id left join user on story.user_id=user.id group by story.id ORDER BY `date` DESC");
				break;
			case "oldest":	
				$stmt = $conn->prepare("SELECT story.*, COUNT(comment.story_id) as nrComm, user.username as usrname FROM story left join comment on story.id=comment.story_id left join user on story.user_id=user.id group by story.id ORDER BY `date` ASC");
				break;
			case "mostComments":	
				$stmt = $conn->prepare("SELECT story.*, COUNT(comment.story_id) as nrComm, user.username as usrname FROM story left join comment on story.id=comment.story_id left join user on story.user_id=user.id group by story.id ORDER BY nrComm DESC");
				break;
			case "leastComments":	
				$stmt = $conn->prepare("SELECT story.*, COUNT(comment.story_id) as nrComm, user.username as usrname FROM story left join comment on story.id=comment.story_id left join user on story.user_id=user.id group by story.id ORDER BY nrComm ASC");
				break;
		}
		
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getStory($story_id) {
		global $conn;

		$stmt = $conn->prepare('
			SELECT 
			story.*, 
			COUNT(comment.story_id) as nrComm, 
			user.username as usrname 
			FROM story 
			left join comment on story.id=comment.story_id 
			left join user on story.user_id=user.id 
			WHERE story.id = ?
		');

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
		
		$stmt->execute(array($user_id, $story_id, -1, $date));

		return $conn->lastInsertId();
	}

	function deleteUserStoryVote($user_id, $story_id)
	{
		global $conn;

		$stmt = $conn->prepare('DELETE FROM voteStory WHERE user_id = ? AND story_id = ?');
		$stmt->execute(array($user_id, $story_id));
		return $stmt->fetch();
	}

	function hasUserAlreadyUpvotedStory($user_id, $story_id)
	{
		global $conn;
		$stmt = $conn->prepare('SELECT * FROM voteStory WHERE user_id = ? AND story_id = ? AND up_down = 1');
		$stmt->execute(array($user_id, $story_id));
		return $stmt->fetchAll();
	}

	function hasUserAlreadyDownvotedStory($user_id, $story_id)
	{
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM voteStory WHERE user_id = ? AND story_id = ? AND up_down = -1');
		$stmt->execute(array($user_id, $story_id));
		return $stmt->fetchAll();
	}
?>
