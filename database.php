<?php

// TODO: Fill in db_credentials.php with your credentials
require('db_credentials.php');

/**
 * Connects to the database and returns the pdo
 */
function db_connect() {
  try {
    $dbh = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_SERVER,
                   DB_USER,
                   DB_PWD,
                   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  } catch (PDOException $e) {
    echo "This application exited with failure" .
         "because there was an error when trying to" .
         "connect to its database.";
    exit();
  }
  return $dbh;
}

/**
 * Disconnects from the database
 */
function db_disconnect() {
  global $db;
  $db = null;
}

/**
 * Gets all chats with id greater than the given id
 * so when looking for new chats only, pass the last id
 * the user had in their chat window
 * Returns associative array with chats if successful
 * or error if error occurs
 */
function get_chats($last_id = -1) {
  global $db;
  $result = [];
  try {
    $sql = "SELECT id, user, message FROM Chats WHERE id > ? ORDER BY id";
    $statement = $db->prepare($sql);
    $statement->execute([$last_id]);
    $chats = $statement->fetchAll(PDO::FETCH_ASSOC); // puts in associative array (ready for json)
    
    $result["chats"] = $chats;
    $result["status"] = "ok";
  } 
  catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

/**
 * Inserts a chat for the given user and message
 * Returns associative array to indicate success or error
 */
function insert_chat($user, $message) {
  global $db;
  $result = [];
  try {
    $sql = "INSERT INTO Chats(user, message) VALUES(?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$user, $message]);
    $result["status"] = "ok";
  } 
  catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

?>