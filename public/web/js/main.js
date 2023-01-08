$(document).ready(function () {
    $(".btn-add-cart").on('click', function () {
        $.ajax({
            url: URL_ADD_CART,
            type: 'POST',
            data: {
                product_id: $(this).data('product-id'),
            },
            success: function (result) {
                if (result.success) {
                    toastr.success(result.message);
                } else {
                    if (result.message == 'login_please') {
                        toastr.error('Bạn cần đăng nhập để thêm giỏ hàng.');
                    } else {
                        toastr.error(result.message);
                    }
                }
            }
        });
    });


});

