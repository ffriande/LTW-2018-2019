<?php
  include_once('config/init.php');
  include_once('database/story.php');
  
  $story_id = trim(strip_tags($_POST['story_id']));

  downvoteStory($story_id);

?>
