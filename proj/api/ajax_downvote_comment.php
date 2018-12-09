<?php
  include_once('config/init.php');
  include_once('database/comment.php');
  
  $comment_id = trim(strip_tags($_POST['comment_id']));

  downvoteComment($comment_id);

?>
