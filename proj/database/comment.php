<?php

  
  function getAllComments($story_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM comment WHERE story_id = ? ORDER BY `date` Desc');
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

  function createReply(
    $story_id,
    $user_id,
    $description,
    $date,
    $karma,
    $father
  ) {

    global $conn;

    $stmt = $conn->prepare('INSERT INTO comment (`story_id`, `user_id`, `description`, `date`, `karma`,`father`) VALUES  ( ?, ?, ?, ?, ?,?)');
    
    $stmt->execute(array($story_id, $user_id, $description, $date, $karma,$father));

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
    
    $stmt->execute(array($user_id, $comment_id, -1, $date));

    return $conn->lastInsertId();
  }

  function deleteUserCommentVote($user_id, $comment_id)
  {
    global $conn;

    $stmt = $conn->prepare('DELETE FROM voteComment WHERE user_id = ? AND comment_id = ?');
    $stmt->execute(array($user_id, $comment_id));
    return $stmt->fetch();
  }

  function hasUserAlreadyDownvotedComment($user_id, $comment_id)
  {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM voteComment WHERE user_id = ? AND comment_id = ? AND up_down = -1');
    $stmt->execute(array($user_id, $comment_id));
    return $stmt->fetchAll();
  }

  function hasUserAlreadyUpvotedComment($user_id, $comment_id)
  {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM voteComment WHERE user_id = ? AND comment_id = ? AND up_down = 1');
    $stmt->execute(array($user_id, $comment_id));
    return $stmt->fetchAll();
  }

  function findReplies($father){
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM comment WHERE father = ? ORDER BY `date` Desc');
    $stmt->execute(array($father));
    return $stmt->fetchAll();
  }
?>
