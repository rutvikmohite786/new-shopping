$(document).ready(function() {
    $("#userform").validate({
        rules: {
            name: "required",
            email:"required",
            status:"required"
        , }
    });
});