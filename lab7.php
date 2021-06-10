<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyChat</title>
  <link rel="stylesheet" href="lab7.css">
  <script src="lab7.js" defer></script>
</head>
<body>
  <!-- You don't need to edit this file at all! -->
  
  <div id="root">
    <!-- Chat Window -->
    <div id="chat-window">
      <!-- Fake starter messages to show what should look like -->
      <!-- You may delete if you choose once you get everything working -->
      <span class="user">User1:</span>
      <span class="message">Hey how's it going?</span>
    
      <span class="user">User2:</span>
      <span class="message">Good how about you?</span>
    
      <span class="user">User1:</span>
      <span class="message">Pretty good</span>
    
      <span class="user">User3:</span>
      <span class="message">Hey I'm good too, thanks for asking</span>

      <!-- More chats will go here! -->
    </div>

    <!-- Chat Inputs (text box and Send button) -->
    <form id="chat-form">
      <textarea id="input" rows="3"></textarea>
      <input type="submit" value="Send" id="send-btn">
    </form>

    <!-- Gif Button and div -->
    <button id="gif-btn">Get Gifs</button>
    <div id="gifs">
      <!-- Populate using GIPHY API -->
    </div>
  </div>
</body>
</html>