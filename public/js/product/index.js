$(document).ready(function() {
    $('.productre').addClass('menu-open')
    var counter = 0;
    $("#product").validate({
        rules: {
            name: {
                required: true
            }
            , subcategory: {
                required: true
            }
        , }
    });

    $("#rowAdder").click(function() {
        newRowAdd =
            '<div class="row" id="row"><div class="col-sm-6"><div class="form-group">' +
            '<input type="file" name="img[' + counter + ']" class="form-control-file"></div>' +
            '</div><div class="col-sm-6">' +
            '<button class="btn btn-danger" id="DeleteRow" type="button">' +
            '<i class="bi bi-trash"></i> Delete</button> </div>' +
            '</div>' +
            '</div>';
        $('#newinput').append(newRowAdd);
        counter++
    });

    $("body").on("click", "#DeleteRow", function() {
        $(this).parents("#row").remove();
    })

    $('form#product').on('submit', function(event) {
        $('.form-control-file').each(function() {
           console.log(this)
            $(this).rules("add", {
                required: true
                , messages: {
                    required: "image is required"
                , }
            });
        });
    });
    $("#product").validate();
});
