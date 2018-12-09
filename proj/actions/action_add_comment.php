<?php
	include_once('../config/init.php');
	include_once('../database/comment.php');
	include_once('../database/user.php');

	$comment = trim(strip_tags($_POST['comment']));
	$story_id = trim(strip_tags($_POST['story_id']));
	$user_id = trim(strip_tags($_POST['user_id']));

	createComment($comment,$story_id,$user_id);

	header('Location: ../pages/story.php?id='.$story_id);
?>
