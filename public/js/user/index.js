$(document).ready(function() {
    $("#userform").validate({
        rules: {
            name: "required",
            email:"required",
            status:"required"
        , }
    });
    $(document).on("click",".opn-filter",function() {
        $('.filter').toggle();
    });
});