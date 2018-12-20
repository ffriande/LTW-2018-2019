<?php
function getUserInfo($user){
    global $conn;
  
    $stmt = $conn->prepare('SELECT * FROM user WHERE `username`=?');    
    $stmt->execute(array($user));
    return $stmt->fetch();
}

function getUserStories($username){
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM story WHERE `user_id`= (SELECT id FROM user WHERE username=?)');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

function getUserComments($username)
{
  global $conn;

  $stmt = $conn->prepare('SELECT * FROM comment WHERE `user_id` = (SELECT id from user where username=?)');
  $stmt->execute(array($username));
  return $stmt->fetchAll();
}

function getVotesStory($username)
{

  global $conn;
  $stmt = $conn->prepare('SELECT SUM(up_down) AS karma FROM voteStory WHERE `user_id` = (SELECT id from user where username=?)');
  $stmt->execute(array($username));
  $result = $stmt->fetch();
  return $result['karma'];
}

function getVotesComment($username)
{
  global $conn;
  $stmt = $conn->prepare('SELECT SUM(up_down) AS karma FROM voteComment WHERE `user_id` = (SELECT id from user where username=?)');
  $stmt->execute(array($username));
  $result = $stmt->fetch();
  return $result['karma'];
}
?>