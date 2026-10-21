function showCart(cart) {
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal('show'); 
}

function getCart(action) {
    $.ajax({
        url: action,
        type: 'get', 
        success: function (result) {
            showCart(result);
        },
        error: function (xhr, status, error) {
            console.error('Ошибка загрузки корзины:', status, error);
            alert('Ошибка при загрузке корзины');
        }
    });
}

$(function () {
    $('.addtocart').on('submit', function () {
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('Error!');
                console.log(msg.responseJSON);
                form[0].reset();
            }
        });

        return false; 
    });
});