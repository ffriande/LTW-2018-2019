<?php
	include_once('config/init.php');
	include_once('database/story.php');

	$title = trim(strip_tags($_POST['title']));
	$description = trim(strip_tags($_POST['description']));

	$story_id = createStory($title, $description);

	header('Location: pages/stories.php?id='.$story_id);  
?>
