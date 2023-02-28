$(document).ready(function() {
    $('.productre').addClass('menu-open')
    $("#productpricestockform").validate({
        rules: {
            unitprice: "required",
            product:"required",
            atter:"required",
            sellingprice:"required",
            discountamount :"required",
            quantity:"required"
        }
    });
});