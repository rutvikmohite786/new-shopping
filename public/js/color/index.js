$(document).ready(function() {
    $('.productre').addClass('menu-open')
    $("#colorform").validate({
        rules: {
            name: "required",
            code:"required"
        , }
    });
});