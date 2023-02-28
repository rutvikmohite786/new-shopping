$(document).ready(function() {
    $('.productre').addClass('menu-open')
    $(".updateimg").click(function () {
        $('.fileinput').toggle();
    });
    $("#bannerform").validate({
        rules: {
            name: "required",
            desc:"required",
            link:"required",
            img:"required"
        }
    });
});