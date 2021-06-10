<?php

require('database.php');
$db = db_connect();


/*
TODO:
Implement endpoints described in the lab writeup

Hints:
- Use $_SERVER["REQUEST_METHOD"] to detect if a request is a GET or POST request
- If it's a GET request, you can use empty($_GET) to check if there are no GET parameters
- Look at database.php to see what's implemented for you...
*/
$requestMethod = $_SERVER["REQUEST_METHOD"];

// GET Endpoints

  // Endpoint for getting the complete chat history
  // GET /chat.php

  
  // Endpoint for getting new chats since given last chat id
  // GET /chat.php?last_id=#

  
// Endpoint for user sending new chat
if($requestMethod == 'GET'){
  if(empty($_GET)){
    ///students/username/labs/chat.php
    echo json_encode(get_chats());
  }else{
    ///students/username/labs/chat.php?last_id=#
    echo json_encode(get_chats($_GET['last_id']));
  }
  
}
// POST /chat.php

  // Hint: If using JSON data for POST, 
  // need to populate $_POST superglobal yourself with:
  // $_POST = json_decode(file_get_contents('php://input'), true);
  // Hint: Use JSON data, form data is restrictive



// Set content type to json, and output json in page to be sent
else{
  header("Content-type: application/json");
  $_POST = json_decode(file_get_contents('php://input'), true);
  echo json_encode(insert_chat($_POST['user'], $_POST['message']));
}



db_disconnect();

?>