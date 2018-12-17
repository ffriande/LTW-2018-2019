<?php
	include_once('../config/init.php');

	include_once('../templates/header.php');

	include_once('../database/story.php');

	if(isset($_GET['sort'])) {

		$stories = getAllStories($_GET['sort']);
		$sort = $_GET['sort'];
		
	} else
		$stories = getAllStories("recent");

	include_once('../templates/list_stories.php');

	include_once('../templates/footer.php');
?>
