$(document).ready(function() {
    setTimeout(function() {
        $('#message').fadeOut('fast');
    }, 4000); // <-- time in milliseconds

    //for errors
    setTimeout(function() {
        $('#error').fadeOut('fast');
    }, 4000); // <-- time in milliseconds
});