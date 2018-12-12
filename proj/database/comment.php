<?php

  
  function getAllComments($story_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM comment WHERE story_id = ? ORDER BY karma');
    $stmt->execute(array($story_id));
    return $stmt->fetchAll();
  }


  function createComment(
    $story_id,
    $user_id,
    $description,
    $date,
    $karma
  ) {

    global $conn;

    $stmt = $conn->prepare('INSERT INTO comment (`story_id`, `user_id`, `description`, `date`, `karma`) VALUES  ( ?, ?, ?, ?, ?)');
    
    $stmt->execute(array($story_id, $user_id, $description, $date, $karma));

    return $conn->lastInsertId();
  }

  function upvoteComment(
    $user_id,
    $comment_id,
    $date
  )
  {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO voteComment (`user_id`, `comment_id`, `up_down`, `date`) VALUES  ( ?, ?, ?, ?)');
    
    $stmt->execute(array($user_id, $comment_id, 1, $date));

    return $conn->lastInsertId();
  }

  function downvoteComment(
    $user_id,
    $comment_id,
    $date
  )
  {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO voteComment (`user_id`, `comment_id`, `up_down`, `date`) VALUES  ( ?, ?, ?, ?)');
    
    $stmt->execute(array($user_id, $comment_id, 0, $date));

    return $conn->lastInsertId();
  }
?>
