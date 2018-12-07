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

  function editUser($username, $password, $user_id) {
    global $conn;  
      
    $options = ['cost' => 12];
    $hash = password_hash($password, PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('INSERT INTO users VALUES (?, ?)');
    $stmt->execute(array($username, $hash));
  }


?>