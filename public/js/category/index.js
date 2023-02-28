$(document).ready(function() {
    $('.categorye').addClass('menu-open')
    $(".updateimg").click(function () {
        $('.fileinput').toggle();
    });
    $("#categoryform").validate({
        rules: {
            name: "required",
            img:"required"
        , }
    });
});