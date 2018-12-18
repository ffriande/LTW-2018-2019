<?php
function getUserInfo($user){
    global $conn;
  
    $stmt = $conn->prepare('SELECT * FROM user WHERE `username`=?');    
    $stmt->execute(array($user));
    return $stmt->fetch();
}

function getUserStories($username){
      global $conn;
  
      $stmt = $conn->prepare('SELECT * FROM story WHERE `user_id`=(SELECT id FROM user WHERE username=?)');
      $stmt->execute(array($username));
      return $stmt->fetchAll();
    
  }

  function getUserComments($user_id){
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE `user_id` =(SELECT id from user where username=?)');
    $stmt->execute(array($user_id));
    return $stmt->fetchAll();
  
}


function getUserPoints($username){
   global $conn;
     
   $stmt = $conn->prepare('SELECT story.id FROM story WHERE `user_id` = (SELECT id FROM user WHERE username=?)');
   $stmt->execute(array($username));
   $stories = $stmt->fetch();
   $stmt = $conn->prepare('SELECT comment.id FROM comment WHERE `user_id` = (SELECT id FROM user WHERE username=?)');
   $stmt->execute(array($username));
   $comments = $stmt->fetch();
   $points = 0;
   
   foreach($stories as $key)
       $points += getVotesPost($key);
    foreach($comments as $key)
       $points += getVotesComment($key);
   return $points;  
}

function getVotesPost($id){
    
    global $conn;
    $stmt = $conn->prepare('SELECT voteStory.up_down FROM voteStory WHERE story_id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    $points = 0;  
    foreach ($result as $key) 
        $points += $key;
    return $points;
}

function getVotesComment($id){
    
    global $conn;
    $stmt = $conn->prepare('SELECT voteComment.up_down FROM voteComment WHERE comment_id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    $points = 0;
    foreach ($result as $key) 
        $points += $key;
    return $points; 
}
?>