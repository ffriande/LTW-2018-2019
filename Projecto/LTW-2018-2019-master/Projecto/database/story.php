<?php
  function getAllStories() {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM story');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getStory($story_id) {
    global $conn;
    
    $stmt = $conn->prepare('SELECT * FROM story WHERE id = ?');
    $stmt->execute(array($story_id));
    return $stmt->fetch();  
  }

  function createStory($title, $content) {
    global $conn;
    
    $stmt = $conn->prepare('INSERT INTO story VALUES ( ?, ?)');
    $stmt->execute(array($title, $content));
    return $stmt->fetch();  
  }

  function upvoteStory($story_id)
  {
    # code...
  }

  function downnvoteStory($story_id)
  {
    # code...
  }
?>
