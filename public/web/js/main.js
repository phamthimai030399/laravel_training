$(document).ready(function () {
    $(".btn-add-cart").on("click", function () {
        $.ajax({
            url: URL_ADD_CART, //Hằng số khai báo ở layout
            type: "POST",
            data: {
                product_id: $(this).data("product-id"), //form request
            },
            success: function (result) {
                if (result.success) {
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                }
            },
        });
    });
});
