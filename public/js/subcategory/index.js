$(document).ready(function() {
    $('.categorye').addClass('menu-open')
    $(".updateimg").click(function () {
        $('.fileinput').toggle();
    });
    $("#subcategoryform").validate({
       rules: {
            name: {
                required: true
            }
            , category: {
                required: true
            }
        , }
    });
});