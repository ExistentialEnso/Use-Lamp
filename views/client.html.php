<?php
/**
 * View file for the frontend client.
 *
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */
?>
<html>
  <head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <script src="assets/client.js" ></script>
    <link rel="stylesheet" type="text/css" href="assets/client.css">
    <title>Use Lamp Client</title>
  </head>
  <body>
  <input id="command_line" type="text" placeholder="Type a command and press 'Enter'. Press the up arrow to reload your last command." />
  <div id="output_buffer_container">
    <div id="output_buffer"></div>
  </div>
  </body>
</html>