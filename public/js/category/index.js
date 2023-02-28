$(document).ready(function() {
    $('.categorye').addClass('menu-open')
    $("#categoryform").validate({
        rules: {
            name: "required",
            img:"required"
        , }
    });
});