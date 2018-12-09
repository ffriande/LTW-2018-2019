<?php
	include_once('../config/init.php');
	include_once('../database/story.php');

	$title = trim(strip_tags($_POST['title']));
	$description = trim(strip_tags($_POST['description']));
	$user_id = trim(strip_tags($_POST['user_id']));
	
	$story_id = createStory($title, $description);

	header('Location: ../pages/story.php?id='.$story_id);  
?>
