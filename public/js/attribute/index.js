$(document).ready(function() {
    $('.attribute').addClass('menu-open')
    $("#attributeform").validate({
        rules: {
            name: "required",
            value:"required"
        , }
    });
});