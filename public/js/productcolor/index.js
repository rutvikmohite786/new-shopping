$(document).ready(function() {
    $('.productre').addClass('menu-open')
    $("#productcolorform").validate({
       rules: {
            color: {
                required: true
            }
            , product: {
                required: true
            }
        , }
    });
});