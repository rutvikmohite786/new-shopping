$(document).ready(function() {
    $('.attribute').addClass('menu-open')
    $("#atterform").validate({
        rules: {
            color: "required",
            product:"required",
            atter:"required",
            sellingprice:"required",
            attervalue :"required"
        }
    });
});