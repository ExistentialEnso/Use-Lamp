var last_command = "";

$(document).ready(function() {
    $.post("command-handler.php", {"cmd":"load"}, function(data) {
        $("#output_buffer").append(data);
    });

    $("#command_line").keydown(function(event) {
        if(event.keyCode == 13) {
            command = $("#command_line").val();
            last_command = command;

            $.post("command-handler.php", {"cmd":command}, function(data) {
                $("#output_buffer").append("<br />" + data);

                scrollBufferToBottom();
            });

            $("#command_line").val("");

            $("#output_buffer").append("<br /><br />>" + command);
            scrollBufferToBottom();
        } else if(event.keyCode == 38) {
            $("#command_line").val(last_command);
        }
    });
});

function scrollBufferToBottom() {
    document.getElementById("output_buffer_container").scrollTop = document.getElementById("output_buffer_container").scrollHeight;
}