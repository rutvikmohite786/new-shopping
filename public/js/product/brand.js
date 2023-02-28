$(document).ready(function () {
    $('.productre').addClass('menu-open')
    $("#brandform").validate({
        rules: {
            name: "required",
            desc: "required",
            img: {
                accept: "jpg|jpeg|png|ico",
                required: true
            }
        }
    });

    $(".updateimg").click(function () {
        $('.fileinput').toggle();
    });
});