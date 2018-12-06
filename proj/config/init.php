<?php
  $conn = new PDO('sqlite:database/database.db');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->query('PRAGMA foreign_keys = ON');
  if (NULL == $conn) 
    throw new Exception("Failed to open database");
?>
