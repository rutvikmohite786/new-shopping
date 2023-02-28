$(document).ready(function() {
    $('.categorye').addClass('menu-open')
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