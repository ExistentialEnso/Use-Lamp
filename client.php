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
    <script type="text/javascript">
      $(document).ready(function() {
        $.post("/use-lamp/command.php", {"cmd":"load"}, function(data) {
          $("#output_buffer").append(data);
        });

        $("#command_line").keydown(function(event) {
          if(event.keyCode == 13) {
            command = $("#command_line").val();

            $.post("/use-lamp/command.php", {"cmd":command}, function(data) {
              $("#output_buffer").append("<br />" + data);
            });

            $("#command_line").val("");

            $("#output_buffer").append("<br /><br />>" + command);

            // scroll to bottom of output buffer
            var objDiv = document.getElementById("output_buffer");
            objDiv.scrollTop = objDiv.scrollHeight;
          }
        });
      });
    </script>
  </head>
  <body>
  <div id="output_buffer" style="width:100%; height:100%; margin-bottom:10px; overflow:auto; font-family:monospace"></div>
  <br />
  <input id="command_line" type="text" style="width:100%; font-family:monospace; position:absolute; bottom:0px" />
  </body>
</html>