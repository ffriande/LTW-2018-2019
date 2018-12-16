<?php
	include_once('../config/init.php');
	include_once('../database/story.php');
	include_once('../database/comment.php');


	$story_id = $_GET['id'];

	$story = getStory($story_id);
	$comments = getAllComments($story_id);

	include_once('../templates/header.php');

	include_once('../templates/template_story.php');
	include_once('../templates/footer.php');
?>
