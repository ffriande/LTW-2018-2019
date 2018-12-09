<?php

  
  function getAllComments($story_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM comment WHERE story_id = ?');
    $stmt->execute(array($story_id));
    return $stmt->fetch();  
  }

  function createComment($story_id, $user_id, $comment) {
    global $conn;
    
    $stmt = $conn->prepare('INSERT INTO comment VALUES ( ?, ?, ?)');
    $stmt->execute(array($story_id, $user_id, $comment));
    return $stmt->fetch();  
  }

  function upvoteComment($comment_id)
  {
    # code...
  }

  function downnvoteComment($comment_id)
  {
    # code...
  }
?>
