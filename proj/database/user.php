<?php
  function createUser($username, $password, $passwordconfirm) {
    global $conn;  
      
    $options = ['cost' => 12];
    $hash = password_hash($password, PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('INSERT INTO user VALUES (NULL,?, ?)');
    $stmt->execute(array($username, $hash));
  }

  function verifyUser($username, $password) {
    global $conn;  
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();
    return ($user !== false && password_verify($password, $user['password']));
  }

  function editCurrentUser(
        $username, 
        $password
      )
  {
    global $conn;

    $options = ['cost' => 12];
    $hash = password_hash($password, PASSWORD_DEFAULT, $options);
    
    $stmt=$conn->prepare('UPDATE user SET username=?,password=? WHERE username=?');

    $result = $stmt->execute(array($username,$hash,$_SESSION['username']));

    return $result;
  }

  function getCurrentUser()
  {
    global $conn;
    
    $access=$conn->prepare('SELECT * FROM user WHERE username=?');
    $access->execute(array($_SESSION['username']));
    
    $currentUser=$access->fetch();
    
    return $currentUser;
  }

  function getUserStories($username){
      global $conn;
  
      $stmt = $conn->prepare('SELECT * FROM story WHERE `user_id`=(SELECT id FROM user WHERE username=?)');
      $stmt->execute(array($username));
      return $stmt->fetch();
    
  }

  function getUserComments($user_id){
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE `user_id` =(SELECT id from user where username=?)');
    $stmt->execute(array($user_id));
    return $stmt->fetch();
  
}

?>
