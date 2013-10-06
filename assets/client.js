var last_command = "";

var last_notifications = (new Date()).getTime();

$(document).ready(function() {
    $.post("command-handler.php", {"cmd":"load"}, function(data) {
        $("#output_buffer").append(data);

        setTimeout(checkNotifications(), 500);
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

function checkNotifications() {
    $.post("check-notifications.php", {"cutoff":last_notifications}, function(data) {
        if(data == "") return;

        data = $.parseJSON(data);

        $("#output_buffer").append(data.output);
        scrollBufferToBottom();

        last_notifications = data.latest;

        checkNotifications();
    });
}

function scrollBufferToBottom() {
    document.getElementById("output_buffer_container").scrollTop = document.getElementById("output_buffer_container").scrollHeight;
}