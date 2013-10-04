$(document).ready(function() {
    $.post("command.php", {"cmd":"load"}, function(data) {
        $("#output_buffer").append(data);
    });

    $("#command_line").keydown(function(event) {
        if(event.keyCode == 13) {
            command = $("#command_line").val();

            $.post("command.php", {"cmd":command}, function(data) {
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