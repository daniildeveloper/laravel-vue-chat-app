<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <h1>Chat room</h1>
  <div id="app" class="container">
    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messagesent="addMessage" ></chat-composer>
  </div>

  <script type="text/javascript" src="js/app.js"></script>
</body>
</html>