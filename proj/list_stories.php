<?php
  include_once('config/init.php');
  include_once('database/story.php');

  $stories = getAllStories();
  
  include ('templates/header.php');
  include ('templates/list_stories.php');
  include ('templates/footer.php');
?>
